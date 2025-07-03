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
            <h1 class="m-0"> Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Admin.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-md-3 col-sm-3 col-6">
            <a href="studentlist.php" class="text-white">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="fa fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" >Students</span>
                <span class="info-box-number">5,000</span>
                <!-- <a href="studentlist.php"> -->
                <div class="progress">
                  <div class="progress-bar" style="width: 30%"></div>
                </div>
                <span class="progress-description text-info">
                  Click Here
                </span>
              </div>
            <!-- </a> -->
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
        
          <div class="col-md-3 col-sm-3 col-6">
          <a href="teacherlist.php" class="text-white">
            <div class="info-box bg-gradient-primary">
              <span class="info-box-icon"><i class="fa fa-laptop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Teachers</span>
                <span class="info-box-number">1,050</span>
          
                <div class="progress">
                  <div class="progress-bar" style="width:70%"></div>
                </div>
                <span class="progress-description text-primary">
                Click Here
                </span>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a> 
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
          <a href="inventory.php" class="text-dark">
            <div class="info-box bg-gradient-warning">
              <span class="info-box-icon"><i class="fa fa-warehouse"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">500</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 80%"></div>
                </div>
                <span class="progress-description text-warning">
                  80% New Inventory
                </span>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
          <a href="maintenance.php" class="text-dark">
            <div class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-archive"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Archived</span>
                <span class="info-box-number">10</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  NO DATA TO SHOW
                </span>
              </div>

              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>  
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card">
                

                

                <img src="../images/SCS photo.jpg" class="img-fluid" style="max-width: 100%; height: 300px; display: block; margin: auto;">


              
              </div>
            </div>

            <div class="card card-row card-danger">
          <div class="card-header">
            <h3 class="card-title">
              To Do
            </h3>
          </div>
          <div class="card-body">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title">No Data To Shoow</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#5</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
           <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          <div class="card bg-gradient-primary">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    if (calendarEl) {
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: '400px',
        themeSystem: 'bootstrap',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
          // example events
          {
            title: 'CLUTCH WEEK',
            start: '2025-05-10',
            description: 'Weekly team meeting',
            end: '2025-05-14'
          },
          {
            title: 'THESIS DEFENSE DAY',
            start: '2025-05-14',
            end: '2025-05-15'
          }
        ]
      });

      calendar.render();
    }
  });
</script>