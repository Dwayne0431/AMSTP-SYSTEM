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
            <h1 class="m-0"> About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Admin.php">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
                <h5 class="card-title">Subic Central School<br>Asset Management with Student Teacher Profiling System(AMSTP)</h5>

                <br><br><br>

                <p class="card-text">
                  The Asset Management with Student Teacher Profiling System(AMSTP) is a spcialized system similar to  enrollment system which gather
                  data of both student and teacher info.
                </p>

                
                <a href="#" class="card-link">System Developers</a>
              </div>
            </div>

        
       
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">User's Manual Guide</h5>

                <br/>
                <p class="card-text">
                  This section will tell you how AMSTP works From its basic input to admin privileges.Feel free to explore SCS AMSTP system .
                </p>

                
                <a href="#" class="card-link">Go</a>
              </div>
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