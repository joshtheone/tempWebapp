<?php
class UserController extends User{
    public function index()
    {
        Auth();
        return view("Auth/includes/dashboard.php",USER);
    }

    public function profile()
    {
        Auth();
        $id = USER['id'];
        $user = $this->getUser($id);

        $roles = $this->roles($id);

       
        $all_roles = $this->Role()->All_roles();
        $n = new Uploads();

        $data = array();
        return view("Auth/includes/profile.php",[$user,$roles,$all_roles,$n->media(USER['id'])]);
    }

    public function changeProfile()
    {
        scrf();
        $id = USER['id'];
        $filename = upload($_FILES['profile']);
        if($filename !== false){
            $uploaded = $this->saveUpload($filename);
            if(!$this->profexist($id)){
                $sql = "INSERT INTO `profile`(`uid`) VALUES ('$id')";
                $query = $this->db()->query($sql);
            }
            $sql = "UPDATE `profile` SET `profile_id`= $uploaded WHERE `uid` = $id";
            $q = $this->db()->query($sql);
            if($q){
                header("location:profile?s-message=Userprofile is Successfully Updated");
            }
        }
    }

    public function selectProfile()
    {
        $profile = $_POST['media'];
        $id = USER['id'];
        $sql = "UPDATE `profile` SET `profile_id`= '$profile' WHERE `uid` = $id";
            $q = $this->db()->query($sql);
            if($q){
                header("location:profile?s-message=Userprofile is Successfully Updated");
            }
    }

    public function profexist($id)
    {
        $sql = "SELECT * FROM `profile` WHERE `uid` = $id";
        $stmt = $this->db()->query($sql);
        if($stmt->rowCount() == 0){
            return false;
        }
        else{
            return true;
        }
    }

 
}

