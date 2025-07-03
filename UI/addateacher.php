<?php
include_once 'dbconnection.php';
session_start();

include_once "sidebar.php";

if(isset($_POST['btnsave'])){

    $teacher_id       = $_POST['txtaid'];
    $name             = $_POST['txtadvname'];
    $advisory         = $_POST['txtadv'];
    $position         = $_POST['txtselect_option'];
    $address          = $_POST['txtaddress'];
    $credentials      = $_POST['txtcred'];
    $contact_number   = $_POST['txtcontnum'];

    $f_name          = $_FILES['myfile']['name'];
    $f_tmp           = $_FILES['myfile']['tmp_name'];
    $f_size          = $_FILES['myfile']['size'];
    $f_extension     = pathinfo($f_name, PATHINFO_EXTENSION);
    $f_extension     = strtolower($f_extension);
    $f_newfile       = uniqid() . '.' . $f_extension;
    $store           = "images/" . $f_newfile;

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    if (in_array($f_extension, $allowed_extensions)) {

        if ($f_size >= 1000000) {
            $_SESSION['status'] = "Max file size should be 1MB";
            $_SESSION['status_code'] = "warning";
        } else {
            if (move_uploaded_file($f_tmp, $store)) {
                $image = $f_newfile;

                // Insert into Adviser Table (Fix this query based on your DB)
                $insert = $pdo->prepare("INSERT INTO teacher_info (teacher_id, name, advisory, position, address, credentials, contact_number, image) 
                                         VALUES (:teacher_id, :name, :advisory, :position, :address, :credentials, :contact_number, :image)");

                $insert->bindParam(':teacher_id', $teacher_id);
                $insert->bindParam(':name', $name);
                $insert->bindParam(':advisory', $advisory);
                $insert->bindParam(':position', $position);
                $insert->bindParam(':address', $address);
                $insert->bindParam(':credentials', $credentials);
                $insert->bindParam(':contact_number', $contact_number);
                $insert->bindParam(':image', $image);

                if ($insert->execute()) {
                    $_SESSION['status'] = "Adviser added successfully";
                    $_SESSION['status_code'] = "success";
                } else {
                    $_SESSION['status'] = "Adviser insert failed";
                    $_SESSION['status_code'] = "error";
                }
            }
        }

    } else {
        $_SESSION['status'] = "Only jpg, jpeg, png, webp, and gif formats are allowed";
        $_SESSION['status_code'] = "warning";
    }
}

?>

 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-6">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Adviser</h1>
            </div><!-- /.col -->`
            <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Admin.php">Home</a></li>
              <li class="breadcrumb-item active">Adviser Form</li>

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
            

            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="m-0">Adviser Form</h5>
              </div>
              


              
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">

<div class="row">
<div class="col-md-6">

<div class="form-group">
        <label >Adviser Id</label>
        <input type="number" class="form-control"  placeholder="Enter ID" name="txtaid"  autocomplete="off" required>
      </div>

<div class="form-group">
        <label >Adviser Name</label>
        <input type="text" class="form-control"  placeholder="Enter Name" name="txtadvname"  autocomplete="off" required>
      </div>

      <div class="form-group">
        <label >Advisory Class</label>
        <input type="text" class="form-control"  placeholder="Enter Name" name="txtadv"  autocomplete="off" required>
      </div>

      <div class="form-group">
            <label>Position</label>
            <select class="form-control"name="txtselect_option" required>
              <option value= "" disabled selected >Select Position</option>
              <option value= ""  >Principal I</option>
              <option value= ""  >Principal II</option>
              <option value= ""  >Principal III</option>
              <option value= ""  >Principal IV</option>
              <option value= ""  >Teacher I</option>
              <option value= ""  >Teacher II</option>
              <option value= ""  >Teacher II</option>
              <option value= ""  >Teacher IV</option>


            </select>
      </div>

      <div class="form-group">
        <label>Address</label>
        <textarea type="text" class="form-control"  placeholder="Enter Address" name="txtaddress" rows="3" required></textarea>
      </div>


</div>




<div class="col-md-6">

<div class="form-group">
        <label >Credentials</label>
        <textarea type="text" class="form-control"  placeholder="Diploma, NCII, Masterals" name="txtcred" rows="3" required></textarea>
      </div>

      <div class="form-group">
        <label >Contact Number</label>
        <input type="number" min="1" step= "any" class="form-control"  placeholder="Enter Contact" name="txtcontnum"  autocomplete="off" required>
      </div>



      <div class="form-group">
        <label >Id Image</label>
        <input type="file" class="input-group" name="myfile">
        <p>Upload image</p>
      </div>



</div>


            </div>

              <div class="card-footer">
                <div class="text-center">
              <button type="submit" class="btn btn-info" name="btnsave">Save Info</button></div>
              </div>
              </form>



              
            </div>



            


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
            </div>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->




  
  
  
  
       <?php

       include_once "footer.php";


        ?>

<?php

if (isset($_SESSION['status']) && $_SESSION['status'] != ''){

?>
  <script>
    Swal.fire({
      icon: '<?php echo $_SESSION['status_code']; ?>',
      title: '<?php echo $_SESSION['status']; ?>'
    });
  </script>


<?php

  unset($_SESSION['status']);
  }

?>

 