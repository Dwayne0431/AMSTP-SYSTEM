<?php
include_once 'dbconnection.php';
session_start();

include_once "sidebar.php";

if (isset($_POST['btnupdate'])) {

    
    $name             = $_POST['txtadvname'];
    $advisory         = $_POST['txtadv'];
    $position         = $_POST['txtselect_option'];
    $address          = $_POST['txtaddress'];
    $contact_number   = $_POST['txtcontnum'];

    // Check if a new file is uploaded
    if (!empty($_FILES['myfile']['name'])) {
        $f_name          = $_FILES['myfile']['name'];
        $f_tmp           = $_FILES['myfile']['tmp_name'];
        $f_size          = $_FILES['myfile']['size'];
        $f_extension     = pathinfo($f_name, PATHINFO_EXTENSION);
        $f_extension     = strtolower($f_extension);
        $f_newfile       = uniqid() . '.' . $f_extension;
        $store           = "images/" . $f_newfile;

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($f_extension, $allowed_extensions)) {
            $_SESSION['status'] = "Only jpg, jpeg, png, webp, and gif formats are allowed";
            $_SESSION['status_code'] = "warning";
            header("Location: add_adviser.php"); // Redirect back to form
            exit();
        }

        if ($f_size >= 1000000) {
            $_SESSION['status'] = "Max file size should be 1MB";
            $_SESSION['status_code'] = "warning";
            header("Location: add_adviser.php");
            exit();
        }

        if (!move_uploaded_file($f_tmp, $store)) {
            $_SESSION['status'] = "Failed to upload image";
            $_SESSION['status_code'] = "error";
            header("Location: add_adviser.php");
            exit();
        }

        $image = $f_newfile;
    } else {
        // If no new file uploaded, keep the existing image
        $stmt = $pdo->prepare("SELECT image FROM teacher_info WHERE teacher_id = :teacher_id");
        $stmt->bindParam(':teacher_id', $teacher_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $image = $row['image'] ?? null; // Use existing image if available
    }

    // Update the teacher's information
    $update = $pdo->prepare("UPDATE teacher_info 
                             SET name = :name, advisory = :advisory, position = :position, address = :address, 
                                 credentials = :credentials, contact_number = :contact_number, image = :image 
                             WHERE teacher_id = :teacher_id");


    $update->bindParam(':name', $name);
    $update->bindParam(':advisory', $advisory);
    $update->bindParam(':position', $position);
    $update->bindParam(':address', $address);
    $update->bindParam(':credentials', $credentials);
    $update->bindParam(':contact_number', $contact_number);
    $update->bindParam(':image', $image);

    if ($update->execute()) {
        $_SESSION['status'] = "Adviser updated successfully";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Failed to update adviser";
        $_SESSION['status_code'] = "error";
    }

    header("Location: addateacher.php");
    exit();
}
?>

 
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-6">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Sheet</h1>
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
            

            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0">Edit Form</h5>
              </div>
              


              
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">

<div class="row">
<div class="col-md-6">



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
            <select class="form-control" name="txtselect_option" required>
                <option value="" disabled selected>Select Position</option>
                <option value="Principal I">Principal I</option>
                <option value="Principal II">Principal II</option>
                <option value="Principal III">Principal III</option>
                <option value="Principal IV">Principal IV</option>
                <option value="Teacher I">Teacher I</option>
                <option value="Teacher II">Teacher II</option>
                <option value="Teacher III">Teacher III</option>
                <option value="Teacher IV">Teacher IV</option>
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
              <button type="submit" class="btn btn-success" name="btnupdate">Update Info</button></div>
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

 