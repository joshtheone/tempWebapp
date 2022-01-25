<?php 
class Uploads extends connect{
    public function saveUpload($filename)
    {
        $id = USER['id'];
        $sql = "INSERT INTO `upload`(`uid`, `name`) VALUES ('$id','$filename')";
        $query = $this->db()->query($sql);
        if($query)
            $upliaded = lastId("upload",$this->db());
            return $upliaded;
    }

    public function media($id)
    {
        $sql = "SELECT * FROM `upload` WHERE `uid` = $id";
        return $this->db()->query($sql);
         
    }
}