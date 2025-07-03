<?php
include_once"dbconnection.php";
session_start();

if($_SESSION['email']==""){

  header('location:../index.php');
  
  }

include_once"sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Donation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Admin.php">Home</a></li>
              <li class="breadcrumb-item active">Donation</li>
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
         <div class="col-xl-6">
  <a href="donationlist.php" class="text-dark">
    <div class="info-box bg-gradient-primary p-4 mb-4" style="min-height: 600px;">
      <span class="info-box-icon" style="font-size: 4.1rem;"><i class="fas fa-donate"></i></span>
      <div class="info-box-content" style="padding: 20px;">
        <span class="info-box-number" style="font-size: 0.5rem; color:rgb(13, 110, 253);">...</span>
        <span class="info-box-text" style="font-size: 3rem;">Donation</span>
        
        <div class="progress">
          <div class="progress-bar" style="width: 80%"></div>
        </div>
        <span class="progress-description text-primary">....</span>
      </div>
    </div>
  </a>
</div>
          <!-- /.col -->
        
          <div class="col-xl-6">
  <a href="adddonation.php" class="text-dark">
    <div class="info-box bg-gradient-success p-4 mb-4" style="min-height: 600px;">
      <span class="info-box-icon" style="font-size: 4.1rem;"><i class="fa fa-plus"></i></span>
      <div class="info-box-content" style="padding: 20px;">
        <span class="info-box-number" style="font-size: 0.5rem; color:rgb(25, 135, 84);">...</span>
        <span class="info-box-text" style="font-size: 3rem;">Add New Donation</span>
        <div class="progress">
          <div class="progress-bar" style="width: 80%"></div>
        </div>
        <span class="progress-description text-success">...</span>
      </div>
    </div>
  </a>
</div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        
          <!-- /.col -->
           
         
          <!-- /.col-md-6 -->
         
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
