<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php asset("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?php asset("css/app.css") ?>">
    <script src="<?php asset("js/jquery.js") ?>"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-6 mx-auto box-center">

                <div class="col-4 mx-auto">
                    <img class="logo" src="<?php asset("img/toym.png") ?>" alt="" srcset="">
                    <h3 class="text-center"><?php echo APP_NAME ?></h3>
                    <h5 class="text-center">Recover Password</h5>
                </div>
                <div class="col-12 col-md-10 mx-auto shadow p-3">
                    <form action="pwdRecover" method="post">
                        <input type="hidden" name="scrf" value="yfvuerhjf#*&(^*Y(UI%Rer985oruejnd">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="<?php  if(isset($_GET['email'])){
                                echo $_GET['email'];
                            } ?>"
                            id="" class="form-control">
                            <small style="color:red;"><?php 
                                if(isset($_GET['error'])){
                                    // if($_GET['error'] == "wrong email"){
                                        echo $_GET['error'];
                                    // }
                                }
                            ?></small>
                        </div>
                        <div class="form-group mt-2 ">
                            <a href="register" class="text-primary text-small link">register here</a>
                            <button type="submit" name="authenticate" class="btn btn-sm btn-primary text-white">send Email</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <!-- <script>
        $().ready(function(){
            $("button").click(function(){
                const card = document.getElementById("card");
                card.classList.add("d-none");
            });
        });
    </script> -->
</body>
</html>