<?php  
class ErrorController{
    public function invalid(){
        return view("error/505.php");
    }

    public function Expiled()
    {
        return view("error/expiled.php");
    }
}