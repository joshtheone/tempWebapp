<?php 
if(isset($_GET['register'])){
    include("resources/views/Auth/register.php");
}else
    include("resources/views/Auth/login.php");