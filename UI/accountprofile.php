<?php

include_once 'dbconnection.php';
session_start();

if($_SESSION['email'] ==""){

  header('location:../index.php');
  
  }


  if($_SESSION['role'] =="Admin"){

    include_once "sidebar.php";
  }else{

include_once "sidebar.php";

  }

// 1 Step) When user click on updatepassword button then we get out values from user info php variables.

if (isset($_POST['btnupdate'])) {

  $oldpassword_txt = $_POST['txt_oldpassword'];
  $newpassword_txt = $_POST['txt_newpassword'];
  $rnewpassword_txt = $_POST['txt_rnewpassword'];

  //echo $oldpassword_txt."-".$newpassword_txt."-".$rnewpassword_txt;

  // 2 Step) Using of select Query we will get out database records according to useremail.


  $email = $_SESSION['email'];

  $select = $pdo->prepare("select * from account where email = '$email'");

  $select->execute();
  $row = $select->fetch(PDO::FETCH_ASSOC);

  $useremail_db = $row['email'];
  $password_db = $row['password'];

  // 3 Step) We will compare the user input values to database values.

  if ($oldpassword_txt == $password_db) {

  if ($newpassword_txt == $rnewpassword_txt) {

  // 4 Step) If values will match then we will run update Query.
  $update=$pdo->prepare("update account set password = :pass where email = :email");
  
  $update->bindParam(':pass', $rnewpassword_txt);
  $update->bindParam(':email', $email);

  if ($update->execute()){

  $_SESSION['status'] = "Password Updated Successfully";
    $_SESSION['status_code'] = "success";
    $_SESSION['redirect'] = "registeracc.php";

  } else {

    $_SESSION['status'] = "Password Not Updated Successfully";
    $_SESSION['status_code'] = "error";
  }



  }else {

     $_SESSION['status'] = "New Password Does Not Matched";
     $_SESSION['status_code'] = "error";

  }



  } else {

    $_SESSION['status'] = "Password Does Not Matched";
    $_SESSION['status_code'] = "error";
  }


  // 4 Step) If values will match then we will run update Query.


}


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Admin.php">Home</a></li>
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                   src="accimg/JDA.jpg"
                   alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['name']; ?></h3>
                <p class="text-muted text-center"><?php echo $_SESSION['email']; ?></p>
              

                <ul class="list-group list-group-unbordered mb-4">
               
                  <li class="list-group-item">
                    <b><?php echo $_SESSION['role']; ?></b> <a class="float-right">2025-Present</a>
                  </li>
                </ul>

                <a href="maintenance.php" class="btn btn-primary btn-block"><b>More Details</b></a>
              </div>
              <!-- /.card-body -->
            </div>
             <div class="col-md-9">


          <!-- Horizontal Form -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Old Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Old Password" name="txt_oldpassword">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="New Password" name="txt_newpassword">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Repeat New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Repeat New Password" name="txt_rnewpassword">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info" name="btnupdate">Update Password</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
          <!-- /.card -->

        </div>
            <!-- /.card -->
 <!-- About Me Box -->
  <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from Kolehiyo Ng Subic At Subic, Zambales 2209
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Zambales, Philippines</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Python</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">No Amount of Money Can Ever Bought A Second Of time .</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- About Me Box -->
          
            <!-- /.card -->
          </div>
         </div>
        <div class="row">
    
       
      
     </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
 <?php

include_once "footer.php";

?>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
  <script>
    Swal.fire({
      icon: '<?php echo $_SESSION['status_code']; ?>',
      title: '<?php echo $_SESSION['status']; ?>'
    }).then(() => {
      <?php if (isset($_SESSION['redirect'])) { ?>
        window.location.href = 'accountprofile.php';
      <?php unset($_SESSION['redirect']); } ?>
    });
  </script>
<?php
  unset($_SESSION['status']);
}
?>