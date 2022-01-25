<?php 
class HomeController extends User{
    public function index(){
        return view("frontend/index.php");
    }

    public function dashboard(){
        Auth();
        if($this->verified()){
            return(view("Auth/dashboard.php",USER));
        }else{
            header("location:verify?e-message=verify your Email!");
        }
    }

    // public function smtpsend()
    // {
    //     if (smtpmailer('agapepct@gmail.com', 'from@mail.com', 'yourName', 'test mail message', 'Hello World!')) {
    //         // do something
    //     }
    //     if (!empty($error)) echo $error;
    // }

    

    
}