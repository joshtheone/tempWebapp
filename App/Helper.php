<?php
function asset($name)
{
    echo "public/" . $name;
}


if (!function_exists("lastId")) {
    function lastId($table, $conn)
    {
        $sql = "SELECT `id` FROM `$table` WHERE id = (SELECT MAX(id) FROM `$table`) ";
        $stmt = $conn->query($sql);
        $data = $stmt->fetch();
        return  $data['id'];
    }
}

// if (!function_exists("uploaded")) {
//     function uploaded($upload)
//     {
//         $sql = "SELECT `name` FROM `upload` WHERE `id` = $upload";
//         $stmt = $conn->query($sql);
//         $data = $stmt->fetch();
//         return  $data['id'];
//     }
// }

if (!function_exists("view")) {

    /**
     * function to return view
     * @param string $name
     * @param null $data 
     * @return bool
	 * @throws Exception
     */
    function view($name, $data = null)
    {
        include_once("resources/views/" . $name);
    }
}

if (!function_exists("uri")) {
    function uri($uri)
    {
        return explode("/", $uri);
    }
}

if (!function_exists("Auth")) {
    function Auth()
    {
        if (isset($_SESSION['id']) && USER['id'] == $_SESSION['id'] && USER['email'] == $_SESSION['email']) {
            return true;
        } else {
            header("location:logout");
            exit();
        }
    }
}

if (!function_exists("login")) {
    function login()
    {
        if (isset($_SESSION['id'])) {

            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists("login")) {
    function login()
    {
        if (isset($_SESSION['id'])) {
            header("location:home");
            exit();
        } else {
            return true;
        }
    }
}


if (!function_exists("Admin")) {
    function Admin()
    {
        if (isset($_SESSION['id'])) {
            if ($_SESSION['level'] == "admin") {
                return true;
            } else {
                header("location:home");
                exit();
            }
        } else {
            header("location:login");
            exit();
        }
    }
}

if (!function_exists("Route")) {

    // function to control web actions
    function Route($name, $action)
    {

        //************* Get the url name  ********** */
        $uri = urldecode(       //*****///*** */ */
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)  //**** */
        );
        /**********/ /****//**/ //*** */ */ */ */
        $url = uri($uri);
        if ($name == $url[2]) {
            $get = explode("@", $action); //get class and method to use
            include("app/controllers/" . $get[0] . ".php");
            $class = new $get[0](); // object creation
            $fun = $get[1]; // function
            $class->$fun(); //
        }
    }
}

if (!function_exists("can")) {

    /** 
     *enter user role to test if user is able to do or not
     * @param string $role 
     * @return bool
     */
    function can($role)
    {
        $user = USER;
        $id = $user['id'];
        $roles = new Role();
        $userR = $roles->User_roles($id);
        extract($userR);
        $ret;
        $retf;
        foreach ($userR as $key => $value) {
            if ($key == $role) {
                if ($value == 1) {
                    $ret = true;
                    break;
                }
                $retf =  false;
            }
            $retf =  false;
        }
        if (isset($ret) && $ret == true) {
            return true;
        } elseif (isset($retf) && $retf == false) {
            return false;
        }
    }
}



if (!function_exists("scrf")) {

    function scrf()
    {
        $string = "yfvuerhjf#*&(^*Y(UI%Rer985oruejnd";
        $uri = urldecode(       //*****///*** */ */
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)  //**** */
        );
        $url = uri($uri);
        if (!empty($_POST)) {
            if (!empty($_POST['scrf'])) {
                if ($_POST['scrf'] === $string) {
                    return true;
                } else {
                    header("location:routes.php?from=".$url[2]);
                    exit();
                }
            } else {
                header("location:routes.php?from=".$url[2]);
                exit();
            }
        }
    }
}

if(!function_exists("extension")){
    function extension($name)
    {
      $arry = explode(".",$name);
      $extension = end($arry);
      $actualExtension = strtolower($extension);
      return $actualExtension;
    }
}

if(!function_exists("upload")){
    function upload($file)
    {
        $name = $file['name'];
        // $size = $file['size'];
        $error = $file['error'];
        $tmp_name = $file['tmp_name'];

        $ext =  extension($name);
        $string = "abcdefghijklmnopqrstuvwxyz1234567890";
        $strgen = str_shuffle($string);
        $newStrName = substr($strgen,0,12);
        $new_name = "Img".$newStrName."media.".$ext;
        $filename = "public/uploads/".$new_name;

        $validExt = array("jpg","png","jpeg","gif","mp4","mov");
        if(in_array($ext,$validExt)){
            if($error == 0){
                $up = move_uploaded_file($tmp_name,$filename);
                if($up){
                    return $filename;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

if(!function_exists("select")){
    function select($table,$key,$values)
    {
        $d = "";
        $sql = "SELECT * FROM".$table." WHERE ";
        for ($i=0; $i < count($key); $i++) { 
            $str = $key[$i]."=".$values[$i];
            $d += $str;
        }
       echo $d;
       new AppendIterator();
    }
}
