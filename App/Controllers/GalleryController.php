<?php
class GalleryController extends Uploads{
    public function gallery()
    {
       return view("Auth\includes\gallery.php",$this->media(USER['id']));
    }
    public function selectProfile()
    {
       return view("Auth\includes\gallery.php",$this->media(USER['id']));
    }

    public function addmedia()
    {
       
        for($i = 0; $i < count($_FILES['file']['name']); $i++){
            $data = array(
                "name"=>$_FILES['file']['name'][$i],
                "size"=>$_FILES['file']['size'][$i],
                "tmp_name"=>$_FILES['file']['tmp_name'][$i],
                "error"=>$_FILES['file']['error'][$i]
            );
            $name=upload($data);
            $this->saveUpload($name);
        }
        header("location:gallery?s-message=successful uploaded!");
    }


}