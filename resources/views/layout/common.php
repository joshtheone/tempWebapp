<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php asset("css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?php asset("css/app.css") ?>">
    <link rel="stylesheet" href="<?php asset("plugins/toastr/toastr.min.css") ?>">

    <script src="<?php asset("js/jquery.js") ?>"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php asset("plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php asset("dist/css/adminlte.min.css") ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>">
    
    <script src="<?php asset("plugins/jquery/jquery.min.js")?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php asset("plugins/jquery-ui/jquery-ui.min.js")?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php asset("plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php asset("dist/js/adminlte.js")?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php asset("dist/js/demo.js")?>"></script>
    <!-- alert -->
    <script src="<?php  asset("plugins/toastr/toastr.min.js")?>"></script> 
    <?php
        if(isset($_GET['s-message'])){
            ?>
                <script>
                    toastr.success('<?php echo $_GET['s-message'] ?>')
                </script>
            <?php
        }
        if(isset($_GET['e-message'])){
            ?>
                <script>
                    toastr.error('<?php echo $_GET['e-message'] ?>')
                </script>
            <?php
        }
        if(isset($_GET['w-message'])){
            ?>
                <script>
                    toastr.warning('<?php echo $_GET['w-message'] ?>')
                </script>
            <?php
        }
        if(isset($_GET['i-message'])){
            ?>
                <script>
                    toastr.info('<?php echo $_GET['i-message'] ?>')
                </script>
            <?php
        }
        
            

