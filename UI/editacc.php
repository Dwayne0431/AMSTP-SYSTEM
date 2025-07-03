<?php

include_once 'dbconnection.php';
session_start();


if($_SESSION['email']=="" OR $_SESSION['role']=="User"){

    header('location:../index.php');
  
  }
  
  if($_SESSION['role']=="Admin"){
  
    include_once "sidebar.php";
  
  }else{
  
    include_once "headeruser.php";
  
  }

  error_reporting(0);


  if(isset($_POST['update-btn'])){

  $name = $_POST['txtname'];
  $email = $_POST['txtemail'];
  $password = $_POST['txtpassword'];
  $role = $_POST['txtselect_option'];
  
//   if(($_POST['txtage'])<18){

   
//     $_SESSION['status']="Age Does Not Meet Age Restriction";
//     $_SESSION['status_code']="warning";


//   }

  if(isset($_POST['txtemail'])){
  
  $select=$pdo->prepare("select email from account where email='$email'");
  
  $select->execute();
  
  
  if($select->rowCount()>0){
  
  
  $_SESSION['status']="Email Already exists. Create a Account From New Email";
  $_SESSION['status_code']="warning";
  
 }

  
  else if(isset($_POST['txtpassword'])){
  
    $select=$pdo->prepare("select password from account where password='$password'");
    
    $select->execute();
    
    
    if($select->rowCount()>0){
    
    
    $_SESSION['status']="Password Already exists. Creata Account From New Password";
      $_SESSION['status_code']="warning";
  
    }else{
    
    $update=$pdo->prepare("update into acount (name,email,password,role) values(:name,:email,:password,:role)");
    
   $update->bindParam(':name',$name);
   $update->bindParam(':email',$email);
   $update->bindParam(':password',$password);
   $update->bindParam(':role',$role);

   
  
  if($insert->execute()){
  
  $_SESSION['status']="Insert successfully the user into the database";
    $_SESSION['status_code']="success";
  
  
  }else{
  
  
  $_SESSION['status']="Error inserting the user into database";
  $_SESSION['status_code']="error";
    
  }
  }
  }
  }
  
    
    
    
    
    }

    
    
  
  ?>




   
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
           

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Edit Your Information</h5>
           </div>
           <div class="card-body">

           <div class="row">

<div class="col-md-6">

    <form action="" method="post">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" value="<?php echo $username_db;?>" placeholder="Enter Name" name="txtname" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="txtemail" required>
                  </div>
             <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  placeholder="Password" name="txtpassword" required>
                  </div>
    
                <!-- select -->
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="txtselect_option">
                          <option value="" disabled selected>Select Role</option>
                          <option>Admin</option>
                          <option>User</option>
                        </select>
                    </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update-btn">Update</button>
                </div>
    </form>

</div>







              </div>
           
          </div>
         </div>
         <div>
           

            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  <?php

include_once"footer.php";


?>
