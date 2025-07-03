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
            <h1 class="m-0"> Archive</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Admin.php">Home</a></li>
              <li class="breadcrumb-item active">Maintenance</li>
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
          <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center">
               <img src="../Images/SCS logo.jpeg" width="80" height="80" alt="SCS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
               <h2 >Under Development</h2>
               </div>

               <h4 class="card-text">
              Sorry for the Inconvenience, Developers are doing their best to make this page work<br/>
               
</h4>

<button type="button" class="btn btn-primary float-right" onclick="window.location.href='Admin.php'">Go Back</button>
</div>
            </div>
            </div>

            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
  
  <?php


include_once"footer.php";
?>