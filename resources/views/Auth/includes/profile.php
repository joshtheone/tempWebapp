<?php view("layout/common.php", "");

$user = $data[0];
$role = $data[1];
$media = $data[3];
$allroles = $data[2];
$USER = new User();
?>
<link rel="stylesheet" href="<?php asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>">
<link rel="stylesheet" href="<?php asset("lugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>">
<link rel="stylesheet" href="<?php asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css") ?>">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <body class="hold-transition sidebar-mini">
      <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="card card-primary card-outline" style="z-index:1000">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class=" img-fluid img-circle" style="object-fit:cover; height:150px;width:150px;" src="<?php  echo $USER->uploaded(USER['prof']); ?>" alt="User profile picture" id="profile">
                      </div>

                      <h3 class="profile-username text-center"><?php echo $user['full-name'] ?></h3>

                      <p class="text-muted text-center">Software Engineer</p>

                    </div>
                    <div class="drop-down d-none  shadow">
                      <small id="profile" class="btn btn-sm btn-danger m-1">x</small>
                      <form action="changeProfile" class="p-5 " id="form" enctype="multipart/form-data" method="post">
                        <input type="file" name="profile" class="form-control" id="file">
                        <button type="submit" class="btn btn-sm btn-info ">Save</button>
                      </form>
                      <ul class="nav">
                        <li class="nav-item">
                          <a href="#" id="gallery" data-toggle="modal" class="nav-link">select from your gallery &hellip;</a>
                        </li>
                      </ul>
                      <script>
                        $(document).ready(function () {
                          $("#gallery").click(function (e) { 
                            e.preventDefault();
                            $("#chat").removeClass("d-none");
                            $("#form").addClass("d-none");
                          });
                        });
                      </script>
                      <div id="chat" class="card direct-chat direct-chat-warning d-none">
                        <div class="card-header">
                          <h3 class="card-title">Select profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <!-- Conversations are loaded here -->
                          <div class="row">
                              <?php  
                                  
                                  while ($img = $media->fetch()) {
                                      ?>
                                           <div class="col-6 mx-auto p-2" data-id="<?php echo $img['id']?>" id="img">
                                               <img src="<?php echo $img['name']?>" height="100" width="100%" style="object-fit: cover;" alt="picture">
                                           </div> 
                                      <?php
                                  }
                              ?>
                          </div>
                          <!--/.direct-chat-messages-->
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <form action="saveprof" method="post">
                            <div class="input-group">
                              <input type="hidden" name="media" value="" id="media">
                              <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">save</button>
                              </span>
                            </div>
                          </form>
                        </div>
                        <!-- /.card-footer-->
                      </div>
                    </div>

                    <script>
                      $("#profile").click(function(e) {
                        e.preventDefault();
                        $(".drop-down").toggleClass("d-none");
                      });

                      $(document).on('click', '#img', function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        $("#media").val(id);
                      });
                    </script>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- About Me Box -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong><i class="fas fa-book mr-1"></i> Education</strong>

                      <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                      </p>

                      <hr>

                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                      <p class="text-muted">Malibu, California</p>

                      <hr>

                      <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                      <p class="text-muted">
                        <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span>
                      </p>

                      <hr>

                      <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#data" data-toggle="tab">data</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab">Edit</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">

                        <div class="active tab-pane"" id=" data">
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">User Info</h3>
                            </div>

                            <div class="card-body">

                              <div class="form-group">
                                <label for="exampleInputBorder">Full Name </label>
                                <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['full-name'] ?>" id="exampleInputBorder">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputBorder">Email </label>
                                <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user-email'] ?>" id="exampleInputBorder">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputBorder">Phone </label>
                                <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user-phone'] ?>" id="exampleInputBorder">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputBorder">user_level </label>
                                <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user_level'] ?>" id="exampleInputBorder">
                              </div>
                            </div>


                            <div class="card-header">
                              <h3 class="card-title">User Roles</h3>
                            </div>
                            <div class="card-body">
                              <h3>User Can</h3>
                              <?php
                              foreach ($role as $roles) {
                              ?>
                                <div class="form-group">
                                  <!-- <label for="exampleInputBorder">Full Name </label> -->
                                  <input type="text" class="form-control form-control-border" disabled value="<?php echo $roles ?>" id="exampleInputBorder" placeholder=".form-control-border">
                                </div>
                              <?php
                              }
                              ?>

                            </div>
                          </div>
                          <!-- /.card -->
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="<?php echo "Edit" ?>">

                          <form action="UpdateUser" method="post">
                            <input type="hidden" class="form-control form-control-border" name="scrf" value="yfvuerhjf#*&(^*Y(UI%Rer985oruejnd" id="exampleInputBorder">
                            <div class="form-group">
                              <label for="exampleInputBorder">Full Name </label>
                              <input type="text" class="form-control form-control-border" name="name" value="<?php echo $user['full-name'] ?>" id="exampleInputBorder">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputBorder">Email </label>
                              <input type="text" class="form-control form-control-border" name="email" value="<?php echo $user['user-email'] ?>" id="exampleInputBorder">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputBorder">Phone </label>
                              <input type="text" class="form-control form-control-border" name="phone" value="<?php echo $user['user-phone'] ?>" id="exampleInputBorder">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputBorder">user_level </label>
                              <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user_level'] ?>" id="exampleInputBorder">
                              <input type="hidden" class="form-control form-control-border"  value="<?php echo $user['id'] ?>" id="exampleInputBorder">
                            </div>
                            <button type="submit" name="save" class="form-control btn btn-primary">save</button>

                          </form>
                        </div>
                        <!-- /.tab-pane -->
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
        <div id="gallery" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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

        <!--Module to Edit -->
        <!-- <div id="Roledelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bounceInRight">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Role Delete</h4>
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
    </div> -->
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