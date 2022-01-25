<?php
class User extends connect
{
    public function user()
    {
        if (login()) {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM `user` WHERE id = $id";
            $stmt = $this->db()->query($sql);
            $exc = $stmt->fetch();

            // profile
            $sql = "SELECT * FROM `profile` WHERE `uid` = $id";
            $stmt = $this->db()->query($sql);
            $prof = $stmt->fetch();
            if($prof['profile_id'] !== NULL){
                $pid = $prof['profile_id'];
            }else{
                $pid = NULL;
            }

            return $array = array(
                "id" => $exc['id'],
                "name" => $exc['full-name'],
                "phone" => $exc['user-phone'],
                "email" => $exc['user-email'],
                "level" => $exc['user_level'],
                "prof" => $pid,
                "status" => $exc['status']
            );
        }
    }

    public function Alluser()
    {
        $sql = "SELECT * FROM `user`";
        $exc = $this->db()->query($sql);

        return $exc;
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM `user` WHERE id='$id'";
        $stmt = $this->db()->query($sql);
        $exc = $stmt->fetch();
        return $exc;
    }

    protected function getUserRole($id)
    {
        $sql = "SELECT * FROM `roles` WHERE uid='$id'";
        $stmt = $this->db()->query($sql);
        $exc = $stmt->fetch();
        return $exc;
    }

    protected function updateUserRole($allRoles)
    {
        extract($_POST);
        $toUpdate = "";
        foreach ($allRoles as $key => $value) {
            echo $sql = "UPDATE `roles` SET `$value`= '0' WHERE `uid` = $id";
            $this->db()->query($sql);
        }
        foreach ($roles as $key => $value) {
            $sql = "UPDATE `roles` SET `$value`= '1' WHERE `uid` = $id";
            $query = $this->db()->query($sql);
        }
        return true;
    }

    protected function Role(){
        return  new Role();
    }
    //************* <USER ROLES> **************//
    

    public function roles($id)
    {

        // getting User roles 
        $userRoles = $this->getUserRole($id);
        $allowed = $this->Role()->All_roles();//allowed roles
        $roles = array();
        $x = 0;
        foreach ($userRoles as $key => $value) {
            if(in_array($key,$allowed)){
                if($value == 1){
                    $roles[$x]=$key;
                    $x++;
                }
            }
        }

        // if user has no role
        if(empty($roles)){
            $roles[0]="guest";
        }
        return $roles;
    }
    //************* </USER ROLES> **************//

    public function saveUpload($filename)
    {
        $id = USER['id'];
        $sql = "INSERT INTO `upload`(`uid`, `name`) VALUES ('$id','$filename')";
        $query = $this->db()->query($sql);
        if($query)
            $upliaded = lastId("upload",$this->db());
            return $upliaded;
    }

    public function uploaded($upload)
    {
        if($upload !== NULL){
            $sql = "SELECT * FROM `upload` WHERE `id` = $upload";
            if($q = $this->db()->query($sql))
            {
                $e = $q->fetch();
                return $e['name'];
            }
        }else{
            return "public\dist\img\avatar.png";
        }
    }

    public function verification_code($id)
    {
        $mixedCode = "1234567890";
        $createdCode = str_shuffle($mixedCode);
        $code = substr($createdCode,0,6);
        
        $sql = "UPDATE `user` SET `verification_code`='$code' WHERE `id`=$id";
        $q = $this->db()->query($sql);
        if($q){
            if($this->sendCode($code)){
                return True;
            }else
                return false;
        }else{
            return false;
        }
    }
    public function pwdreset_code($id)
    {
        $mixedCode = "1234567890";
        $createdCode = str_shuffle($mixedCode);
        $code = substr($createdCode,0,6);
        
        $sql = "UPDATE `user` SET `pwdreset_code`='$code' WHERE `id`=$id";
        $q = $this->db()->query($sql);
        if($q){
            return $code;
        }else{
            return false;
        }
    }

    public function sendCode($code)
    {
        $body = "
        <div>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum, obcaecati? Similique, iste placeat alias eveniet, sint totam illo commodi dolor eligendi nemo repellendus quod fugit expedita, sunt eum earum saepe.
        </div>
        <h3>CODE: ".$code."</h3><br><br><br>
        <div>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum, obcaecati? Similique, iste placeat alias eveniet, sint totam illo commodi dolor eligendi nemo repellendus quod fugit expedita, sunt eum earum saepe.
        </div>
        ";
        if (smtpmailer(filter_var(USER['email'],FILTER_SANITIZE_EMAIL), EMAIL, APP_NAME, 'VERIFICATION EMAIL', $body)) {
            return "email sent";
        }
        if (!empty($error)) return $error;
    }

    public function resendCode()
    {
        $id = USER['id'];
        $sql = "SELECT * FROM `user` WHERE `id` = $id";
        $q = $this->db()->query($sql);
        $e = $q->fetch();
        if($e['verification_code'] === NULL){
            $this->verification_code($id);
        }else{
            if($this->sendCode($e['verification_code'])){
                return True;
            }else
                return false;
        }
    }

    protected function verify($code)
    {
        $id = USER['id'];
        $sql = "SELECT * FROM `user` WHERE `id` = $id";
        $q = $this->db()->query($sql);
        $e = $q->fetch();
        if($e['verification_code'] == $code){
            $sql="UPDATE `user` SET `status`='verified' WHERE `id`=$id";
            if($this->db()->query($sql)){
                return true;
            }
        }else{
            return false;
        }
    }

    public function verified()
    {
        if($this->user()['status'] === "verified"){
            return true;
        }else{
            return false;
        }
    }

}
$user = new User();
$obj = $user->user();
define("USER", $obj);
