<?php view("layout/common.php","") ;

$user = $data[0];
$role = $data[1];
$allroles = $data[2];
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="public/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $user['full-name'] ?></h3>

                <p class="text-muted text-center">Software Engineer</p>

                </div>
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
                  
                  <div class="active tab-pane"" id="data">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Info</h3>
              </div>
              
              <div class="card-body">
                    
                    <div class="form-group">
                        <label for="exampleInputBorder">Full Name </label>
                        <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['full-name'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Email </label>
                        <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user-email'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Phone </label>
                        <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user-phone'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">user_level </label>
                        <input type="text" class="form-control form-control-border" disabled value="<?php echo $user['user_level'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
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
                        <form action="admineditUser" method="post">
                            <div class="form-group">
                                <label for="exampleInputBorder">Full Name </label>
                                <input type="text" class="form-control form-control-border" name="" disabled value="<?php echo $user['full-name'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">Email </label>
                                <input type="text" class="form-control form-control-border" name="" disabled value="<?php echo $user['user-email'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">Phone </label>
                                <input type="text" class="form-control form-control-border" name="" disabled value="<?php echo $user['user-phone'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBorder">user_level </label>
                                <input type="text" class="form-control form-control-border" name="level" value="<?php echo $user['user_level'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                                <input type="hiden" class="form-control form-control-border" name="id" value="<?php echo $user['id'] ?>" id="exampleInputBorder" placeholder=".form-control-border">
                            </div>
                            <button type="submit" name="save" class="form-control btn btn-primary">save</button>

                        </form>



                        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit User Roles</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <form action="editUserRole" method="post">
                  <div class="form-group">
                    <label>Multiple</label>
                    <select name="roles[]" class="duallistbox" multiple="multiple">
                      <?php
                          foreach ($allroles as $roles) {
                            ?>
                                  <option 
                                  <?php
                                    if(in_array($roles,$role)){
                                      echo "selected";
                                    }
                                  ?>
                                  value="<?php echo $roles ?>"><?php echo $roles ?></option>
                            <?php
                          }
                      ?>
                      
                    </select>
                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                  </div>
                  <button type="submit" name="save" class="form-control btn btn-primary">save</button>
                  <!-- /.form-group -->
                </form>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
         
        </div>
        <!-- /.card -->
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

</div>
<!-- ./wrapper -->
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<script src="public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script>
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
</script>

</body>
</html>
