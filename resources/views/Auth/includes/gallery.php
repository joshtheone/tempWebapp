<?php view("layout/common.php", "") ?>
<link rel="stylesheet" href="<?php asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>">
<link rel="stylesheet" href="<?php asset("lugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>">
<link rel="stylesheet" href="<?php asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css") ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gallery</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">gallery</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-9 mx-auto">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="#data" data-toggle="tab"> <i class="fas fa-briefcase"></i> Gallery</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab"> <i class="fas fa-cog"></i> Add New To Gallery</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane"" id=" data">
                                        <!-- Main content -->
                                        <section class="content">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title">My Gallery</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <?php  
                                                                        $m = $data;
                                                                        while ($img = $data->fetch()) {
                                                                            ?>
                                                                                <div class="col-6 col-sm-4 col-md-3">
                                                                                    <img src="<?php echo $img['name']?>" height="150" width="100%" style="object-fit: cover;" class="p-2" alt="">
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.container-fluid -->
                                        </section>
                                        <!-- /.content -->
                                    </div>
                                    <div class=" tab-pane" id="Edit">
                                        <form action="addmedia" enctype="multipart/form-data" method="post" class="card">
                                            <h3 align="center">Add New media</h3>
                                            <input type="file" name="file[]" multiple class="form-control">
                                            <div class="card-footer">
                                                <button type="submit" name="addRole" class="btn btn-sm btn-info">save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!--Module to Edit -->
        <div id="Roleedit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bounceInRight">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Role setting</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>

                    </div>
                    <div class="modal-body">

                        <div id="settings-content"></div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <!-- DataTables  & Plugins -->
    <script src="<?php asset("plugins/datatables/jquery.dataTables.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-buttons/js/dataTables.buttons.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js") ?>"></script>
    <script src="<?php asset("plugins/jszip/jszip.min.js") ?>"></script>
    <script src="<?php asset("plugins/pdfmake/pdfmake.min.js") ?>"></script>
    <script src="<?php asset("plugins/pdfmake/vfs_fonts.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-buttons/js/buttons.html5.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-buttons/js/buttons.print.min.js") ?>"></script>
    <script src="<?php asset("plugins/datatables-buttons/js/buttons.colVis.min.js") ?>"></script>
    <!-- AdminLTE App -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(document).ready(function() {

            $(document).on('click', '#edit', function(e) {
                e.preventDefault();

                var ras_id = $(this).data('id'); // get id of clicked row


                $('#settings-content').html(''); // leave this div blank
                $('#modal-loader').show(); // load ajax loader on button click

                $.ajax({
                        url: 'editRole',
                        type: 'POST',
                        data: 'id=' + ras_id,
                        dataType: 'html'
                    })
                    .done(function(data) {
                        console.log(data);
                        $('#settings-content').html(''); // blank before load.
                        $('#settings-content').html(data); // load here
                        $('#modal-loader').hide(); // hide loader
                    })
                    .fail(function() {
                        $('#settings-content').html(
                            '<i class="fas fa-info-circle"></i> Something went wrong, Please try again...'
                        );
                        $('#modal-loader').hide();
                    });

            });


            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var ras_id = $(this).data('id'); // get id of clicked row

                $('#settings-content').html(''); // leave this div blank
                $('#modal-loader').show(); // load ajax loader on button click

                $.ajax({
                        url: 'deleteRole',
                        type: 'POST',
                        data: 'id=' + ras_id,
                        dataType: 'html'
                    })
                    .done(function(data) {
                        console.log(data);
                        $('#settings-content').html(''); // blank before load.
                        $('#settings-content').html(data); // load here
                        $('#modal-loader').hide(); // hide loader
                    })
                    .fail(function() {
                        $('#settings-content').html(
                            '<i class="fas fa-info-circle"></i> Something went wrong, Please try again...'
                        );
                        $('#modal-loader').hide();
                    });

            });
        });
    </script>
    <?php
    if (isset($_GET['s-message'])) {
    ?>
        <script>
            toastr.success('<?php echo $_GET['s-message'] ?>')
        </script>
    <?php
    }
    if (isset($_GET['e-message'])) {
    ?>
        <script>
            toastr.error('<?php echo $_GET['e-message'] ?>')
        </script>
    <?php
    }
    if (isset($_GET['w-message'])) {
    ?>
        <script>
            toastr.warning('<?php echo $_GET['w-message'] ?>')
        </script>
    <?php
    }
    if (isset($_GET['i-message'])) {
    ?>
        <script>
            toastr.info('<?php echo $_GET['i-message'] ?>')
        </script>
    <?php
    }



    ?>
</body>

</html>