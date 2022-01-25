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
                    <h5 class="text-center">Register</h5>
                </div>
                <div class="col-12 col-md-10 mx-auto shadow p-3">
                    <form action="signup" method="post">
                        <input type="hidden" name="scrf" value="yfvuerhjf#*&(^*Y(UI%Rer985oruejnd">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Repeat-Password</label>
                            <input type="password" name="password2" id="" class="form-control">
                        </div>
                        <div class="form-group mt-2 ">
                            <a href="login" class="text-primary text-small link">login here</a>
                            <button type="submit" name="register" class="btn btn-sm btn-primary text-white">Register</button>
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