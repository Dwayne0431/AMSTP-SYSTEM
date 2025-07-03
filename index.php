<?php
include_once"UI/dbconnection.php";
session_start();

if(isset($_POST['btn_login'])){

  $email=$_POST['txt_email'];
  $password=$_POST['txt_password'];
  
  $select = $pdo->prepare("select * from account where email='$email' AND password='$password'");


  $select->execute();
  $row=$select->fetch(PDO::FETCH_ASSOC);
  
  
  
  if (is_array($row)){
  
  
    if($row['email']==$email AND $row['password']==$password and $row['role'] == "Admin") {
  
    

      $_SESSION['status'] = "Welcome Admin";
      $_SESSION['status_code'] = "success";
   

      header('refresh:1;UI/Admin.php');

$_SESSION['id'] = $row['id'];
$_SESSION['name'] = $row['name'];
$_SESSION['email'] = $row['email'];
$_SESSION['role'] = $row['role'];



    }else if($row['email']==$email AND $row['password']==$password and $row['role']== "User"){


      $_SESSION['status'] = "Login Success By User";
      $_SESSION['status_code'] = "success";

      
      header('refresh:1;UI/user.php');

      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['role'];




    }else{

   $_SESSION['status'] = "Wrong Email or Password";
   $_SESSION['status_code'] = "error";



    }

  }

}
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCS Log In page</title>
  
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="wrapper">
        <div class="logo">
            <img src="Images/SCS logo.jpeg" alt="SCS logo">
        </div>
        <div class="text-center mt-4 name">
            Subic Central School
        </div>
        <br />
        <form class="" method="post">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email"  placeholder="Email" name="txt_email"required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-lock"></span>
                <input type="password"  placeholder="Password" name="txt_password"required>
            </div>
           <button type="submit" class="btn btn-primary btn-block" name="btn_login">Login</button>
        </form>
       
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>






<?php
if(isset($_SESSION['status']) && $_SESSION['status']!='')

{

?>
<script>

$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 5000
    });

    
      Toast.fire({
        icon: '<?php echo $_SESSION['status_code'];?>',
        title: '<?php echo $_SESSION['status'];?>.'
      })
})



</script>


<?php
unset($_SESSION['status']);
}
?>





  