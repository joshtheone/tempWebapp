<?php
class AuthController extends User
{
    public function login()
    {
        if (!login()) {
            return view("Auth/login.php", "");
        } else {
            header("location:home");
        }
    }
    public function register()
    {
        if (!login()) {
            return view("Auth/register.php", "");
        } else {
            header("location:home");
        }
    }

    public function signin()
    {
        scrf();
        extract($_POST);
        $sql = "SELECT * FROM `user` WHERE `user-email` = '$user' OR `user-phone` = '$user' ";
        $stmt = $this->db()->query($sql);
        // $exc = $stmt->query([$user,$user]);
        $data = $stmt->fetch();
        if ($stmt->rowCount() == 1) {
            if (password_verify($password, $data['user-password'])) {
                $this->session($data['id']);
                $user = $this->userData($data['id']);
                if ($user['level'] == "admin") {
                    header("location:admin");
                    exit();
                } else {
                    header("location:home");
                    exit();
                }
            } else {
                header("location:login?error=wrong password&email=" . $user);
                exit();
            }
        } else {
            header("location:login?error=wrong email/Phone");
            exit();
        }
    }

    public function create()
    {
        scrf();
        extract($_POST);
        if ($password === $password2) {
            // echo $this->checkUser($email,$phone)->count_num_rows();
            $pwd = password_hash($password, PASSWORD_DEFAULT);
            if ($this->checkUser($email, $phone) == 0) {
                $sql = "INSERT INTO `user`(`full-name`, `user-email`, `user-phone`, `user-password`) 
                VALUES (?,?,?,?)";
                $stmt = $this->db()->prepare($sql);
                if ($store = $stmt->execute([$name, $email, $phone, $pwd])) {
                    $id = lastId("user", $this->db());
                    $this->newUserRole($id);
                    $this->profileCreate($id);
                    $this->session($id);
                    $this->verification_code($id);
                    header("location:home");
                }
            } else {
                echo $this->checkUser($email, $phone);
            }
        }
    }

    public function updateUser()
    {
        $id = USER['id'];
        extract($_POST);
        // if($g=$this->checkUser($email,$phone) == 0){

        $sql = "UPDATE `user` SET `full-name`='$name',`user-email`='$email',`user-phone`='$phone' WHERE `id` = $id";
        $q = $this->db()->query($sql);
        if ($q) {
            $this->session($id);
            header("location:profile?s-message=Successfully Updateting!");
        }
        // }else{
        //     header("location:profile?e-message=".$g);
        // }
    }

    private function newUserRole($id)
    {
        $sql = "SELECT * FROM `roles` WHERE `uid` = $id";
        $stmt = $this->db()->query($sql);
        if ($stmt->rowCount() > 0) {
            return 0;
        } else {
            $sql = "INSERT INTO `roles`(`uid`) VALUES ('$id')";
            $stmt = $this->db()->query($sql);
            if ($stmt) {
                return true;
            }
        }
    }

    public function profileCreate($id)
    {
        $sql = "INSERT INTO `profile`(`uid`) VALUES ('$id')";
        $query = $this->db()->query($sql);
    }

    public function checkUser($email, $phone)
    {
        $sql = "SELECT `user-email`, `user-phone` FROM `user` WHERE `user-email` = '$email'";
        $stmt = $this->db()->query($sql);
        if ($phone !== NULL) {
            if ($stmt->rowCount() < 1) {
                $sql = "SELECT `user-email`, `user-phone` FROM `user` WHERE `user-phone` = '$phone'";
                $stmt = $this->db()->query($sql);
                if ($stmt->rowCount() < 1) {
                    return 0;
                } else {
                    return "phoneExist";
                }
            } else {
                return "emailExist";
            }
        } else {
            return 0;
        }
    }

    public function userData($id)
    {
        $sql = "SELECT * FROM `user` WHERE id = $id";
        $stmt = $this->db()->query($sql);
        $exc = $stmt->fetch();
        return $array = array(
            "name" => $exc['full-name'],
            "phone" => $exc['user-phone'],
            "email" => $exc['user-email'],
            "level" => $exc['user_level']
        );
    }

    private function session($id)
    {
        session_start();
        $user = $this->userData($id);
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $user['name'];
        $_SESSION["email"] = $user['email'];
        $_SESSION["level"] = $user['level'];
    }

    public function logout()
    {
        // scrf();
        session_start();
        session_unset();
        session_destroy();
        header("location:login");
    }

    public function adminUpdateUser()
    {
        extract($_POST);
        $sql = " UPDATE `user` SET `user_level`='$level' WHERE `id` = $id";
        $query = $this->db()->query($sql);
        header("location:users?s-message=User level is Successfully Updated");
    }

    public function verifyEmail()
    {
        Auth();
        if(!$this->verified()){
            return(view("error/verification.php",USER));
        }else
        header("location:home");
    }

    public function verification()
    {
        Auth();
        $code = $_POST['code'];
        if ($this->verify($code)) {
            header("location:home?s-message=verification is successfull!");
        } else {
            header("location:verify?e-message=verification is failed!");
        }
    }



    public function resend_verification_code()
    {
        Auth();
        if ($this->resendCode()) {
            header("location:verify?s-message=email sent!");
        }
    }
    public function recoverPasswors()
    {
        return (view("Auth/recoverPassword.php"));
    }

    public function pwdRecover()
    {
        $user = $_POST['email'];
        $sql = "SELECT * FROM `user` WHERE `user-email` = '$user' OR `user-phone` = '$user' ";
        $stmt = $this->db()->query($sql);
        $data = $stmt->fetch();
        if ($stmt->rowCount() == 1) {
            $code = $this->pwdreset_code($data['id']);
            $dd = explode(" ", $data['full-name']);

            $link = HOST_NAME . "newPwd?code=" . $dd[0] . "." . $code;
            $body = '<h4>Click link to Reset Your Password</h4>
            <a href="http://' . $link . '" target="_blank" rel="noopener noreferrer">Reset Password here</a>
            
            <p>For more help contact us through our Contacts</p>';
            if (smtpmailer(filter_var($data['user-email'], FILTER_SANITIZE_EMAIL), EMAIL, APP_NAME, 'Resat password Link', $body)) {
                header("location:recoverPasswors?s-message=Email sent successful");
            }else{
                header("location:recoverPasswors?s-message=something went wrong!");
            }
            if (!empty($error)) header("location:recoverPasswors?s-message=" . $error);
        } else {
            header("location:recoverPasswors?error=Wrong Email!");
        }
    }

    public function newPwd()
    {
        $error = new errors();
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $data = explode(".", $code);
            $name = $data[0];
            $resetcode = end($data);
            $sql = "SELECT * FROM `user` WHERE `pwdreset_code` = $resetcode";
            $stmt = $this->db()->query($sql);
            if ($stmt->rowCount() == 1) {
                $resurt = $stmt->fetch();
                $dd = explode(" ", $resurt['full-name']);
                if ($name === $dd[0]) {
                    return (view("Auth/resetpwd.php", $resurt['id']));
                } else {
                    $error->Expiled();
                }
            } else {
                $error->Expiled();
            }
        } else {
            $error->Expiled();
        }
    }

    public function savePwd()
    {
        $url = $_POST['url'];
        $pwd1 = $_POST['pwd'];
        $pwd2 = $_POST['rpwd'];
        $id = $_POST['id'];
        if ($pwd1 === $pwd2) {
            $pwdH = password_hash($pwd1, PASSWORD_DEFAULT);
            $sql = "UPDATE `user` SET `user-password` ='$pwdH' WHERE `id` =' $id'";
            $stmt = $this->db()->query($sql);
            if ($stmt) {
                header("location:login");
            } else
                header("location:newPwd?code=".$url."&w-message=something went wrong!");
        } else
            header("location:newPwd?code=".$url."&error=match your password!");
    }
}
