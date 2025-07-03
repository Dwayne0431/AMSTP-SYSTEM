

<?php

include_once 'dbconnection.php';
session_start();




include_once "sidebar.php";


if(isset($_POST['btnsave'])){

  $donation      = $_POST['txtdonation'];
  $category         = $_POST['txtselect_option'];
  $description          = $_POST['txtdscrptn'];
  $from      = $_POST['txtdonor'];
  $stock   = $_POST['txtqty'];

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
              $insert = $pdo->prepare("INSERT INTO donation (donation, category, description, `from`, stock, image) 
                         VALUES (:donation, :category, :description, :from, :stock, :image)");


              $insert->bindParam(':donation', $donation);
              $insert->bindParam(':category', $category);
              $insert->bindParam(':description', $description);
              $insert->bindParam(':from', $from);
              $insert->bindParam(':stock', $stock);
              $insert->bindParam(':image', $image);

              if ($insert->execute()) {
                  $_SESSION['status'] = "Donation added";
                  $_SESSION['status_code'] = "success";
              } else {
                  $_SESSION['status'] = "Error Please Try Again";
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Donation</h1>
            </div><!-- /.col -->`
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Page</li> -->

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
            

            <div class="card card-dark card-outline">
              <div class="card-header">
                <h5 class="m-0">Donation Form</h5>
              </div>
              


              
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">

<div class="row">
<div class="col-md-6">

<!-- <div class="form-group">
        <label >Identification</label>
        <input type="number" class="form-control"  placeholder="Enter LRN" name="txtid"  autocomplete="off" required>
      </div> -->

<div class="form-group">
        <label >Donation Name</label>
        <input type="text" class="form-control"  placeholder="Enter Name" name="txtdonation"  autocomplete="off" required>
      </div>

      <div class="form-group">
            <label>Category</label>
            <select class="form-control"name="txtselect_option" required>
              <option value= "" disabled selected >Select Category</option>
              <option value="Sponsored">Sponsored</option>
              <option value="Donated">Donated</option>

            </select>
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea type="text" class="form-control"  placeholder="Enter Descripttion" name="txtdscrptn" rows="4" required></textarea>
      </div>


</div>




<div class="col-md-6">

<div class="form-group">
        <label >Name of Donor</label>
        <input type="text" min="1" step= "any" class="form-control"  placeholder="Enter Name" name="txtdonor"  autocomplete="off" required>
      </div>

      <div class="form-group">
        <label >Quantity</label>
        <input type="text" min="1" step= "any" class="form-control"  placeholder="Enter Quantity" name="txtqty"  autocomplete="off">
      </div>

      <div class="form-group">
        <label >Id Image</label>
        <input type="file" class="input-group" name="myfile" required>
        <p>Upload image</p>
      </div>



</div>


            </div>

              <div class="card-footer">
                <div class="text-center">
              <button type="submit" class="btn btn-info" name="btnsave">Save</button></div>
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

 