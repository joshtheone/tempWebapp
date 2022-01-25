<?php view("layout/common.php","") ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 mx-auto mt-5">
                <h2 class="text-center">Email Verfication Page</h2>
                <h5><?php echo USER['name'] ?></h5>
                <p>
                    Your Email <b><?php echo USER['email'] ?></b> is not Verified. Check your Email to get verification Code
                    <!-- Hit the button to send Verification code -->
                </p>
                <h3>Enter Verification code here</h3>
                <form action="verification" id="form" method="post">
                    <input type="text" name="code" id="code" maxlength="6" class="form-control" >
                    <?php if(isset($_GET['e-message'])){
                        echo '
                            <small class="text-danger">'.$_GET['e-message'].'</small> 
                        ';
                    } ?>
                    <br><br>
                </form>
                <div class="" id="load"></div>
                <script>
                    function len() { 
                        var code = $("#code").val();
                        if(code.length > 5){
                            // $("#code").attr("disabled","");
                           
                            $("#form").submit();
                            clearInterval(mytime);
                        }
                     }
                     var mytime = setInterval(() => {
                        len()
                     }, 100);
                    
                </script>
                <form action="resend_verification_code" method="post">
                    <small class="text-danger">if you do not Recive Verification code try to resend it Here...</small> 
                    <button name="sendEmail"  class="btn btn-primary form-control" type="submit">Send Verification Email</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>