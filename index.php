<?php
    session_start();
    include "Env.php";

    // Mail
    use PHPMailer\PHPMailer\PHPMailer;
  
    include "lib/PHPMailer/PHPMailer.php";
    include "lib/PHPMailer/SMTP.php";
    include "lib/PHPMailer/Exception.php";
    // include "phpmailer.php";

    function smtpmailer($to, $from, $from_name, $subject, $body) { 
        global $error;
        $mail = new PHPMailer();  // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465; 
        $mail->Username = EMAIL;  
        $mail->Password = PWD;           
        $mail->SetFrom($from, $from_name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send()) {
            $error = 'Mail error: '.$mail->ErrorInfo; 
            return false;
        } else {
            $error = 'Message sent!';
            return true;
        }
    }
    include "Database/PDO.php";
    include "App/Helper.php";
    include "App/Models/User.php";
    include "App/Models/Role.php";
    include "App/Models/queue.php";
    include "App/Models/Uploads.php";
    include "App/Models/Error.php";
    
    if(isset($_SESSION["array"])){
        $myqueue = new Myqueue();
        $myqueue->createQueue($_SESSION["array"]);
        // var_dump($_SESSION["array"]);
    }else{
        $_SESSION["array"] = array();
    }

    

    
    // var_dump($_POST);

    Route("","HomeController@index");
    Route("login","AuthController@login");
    Route("register","AuthController@register");
    Route("home","HomeController@dashboard");
    Route("admin","AdminController@adminpanel");
    Route("users","AdminController@users");

    // Errors
    Route("505","ErrorController@invalid");
    Route("pageExpiled","ErrorController@Expiled");

    // verification
    Route("verify","AuthController@verifyEmail");
    Route("resend_verification_code","AuthController@resend_verification_code");
    Route("verification","AuthController@verification");


    // password recover
    Route("recoverPasswors","AuthController@recoverPasswors");
    Route("pwdRecover","AuthController@pwdRecover");  
    Route("newPwd","AuthController@newPwd");  
    Route("savepwd","AuthController@savePwd");  

    // // USER SETTING
    Route("editUser","EditUserController@index");
    Route("editUserRole","EditUserController@editUserRole");//post
    Route("admineditUser","AuthController@adminUpdateUser");//post

    // Auth
    Route("signin","AuthController@signin");//login
    Route("signup","AuthController@create");//register new user
    Route("logout","AuthController@logout");//register new user
    Route("UpdateUser","AuthController@updateUser");



    // // Role Routes
    Route("menageRoles","UserRolesController@index");
    Route("addRole","UserRolesController@create");//post
    Route("editRole","UserRolesController@show");
    Route("deleteRole","UserRolesController@viewdelete");
    Route("Roledelete","UserRolesController@deleteRole");//post

    // user 
    Route("userDashboard","UserController@index");
    Route("profile","UserController@profile");
    Route("changeProfile","UserController@changeProfile");
    Route("gallery","GalleryController@gallery");
    Route("addmedia","GalleryController@addmedia");
    Route("saveprof","UserController@selectProfile");


    Route("smtpsend","HomeController@smtpsend");
    
