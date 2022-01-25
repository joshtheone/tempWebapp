<?php
class Role extends connect{
    public function roles(){
        $sql = "SELECT * FROM `validroles`";
        $query = $this->db()->query($sql);
        return $query;
    }

    public function All_roles(){
        $sql = "SELECT * FROM `validroles`";
        $query = $this->db()->query($sql);
        $x = 0;
        $r = array();
        while ($a = $query->fetch()) {
            $r[$x] = $a['roles'];
            $x++;
        }
        return $r;
    }

    public function User_roles($id){
        $sql = "SELECT * FROM `roles` WHERE `uid` = $id";
        $query = $this->db()->query($sql);
        $data = $query->fetch();
        // $x = 0;
        // $r = array();
        // while ($a = $data->fetch()) {
        //     $r[$x] = $a['roles'];
        //     $x++;
        // }
        return $data;
    }

    protected function getRole($id){
        $sql = "SELECT * FROM `validroles` WHERE `id` = $id";
        $query = $this->db()->query($sql);
        $data = $query->fetch();
        return $data;
    }

    protected function newRole($role,$default){
        $sql = "INSERT INTO `validroles`(`roles`) VALUES ('$role')";
        $query = $this->db()->query($sql);
        if($query){
            $sql = "ALTER TABLE `roles` ADD `$role` INT(1) NOT NULL DEFAULT '$default'";
            $query = $this->db()->query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteRoleData(){
        extract($_POST);
        $sql = "DELETE FROM `validroles`Where `id` = $id";
        $stmt = $this->db()->query($sql);
        if($stmt){
            $sql = "ALTER TABLE `roles` DROP `$role`";
            $stmt = $this->db()->query($sql);
            if ($stmt) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}