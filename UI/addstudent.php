<?php
include_once 'dbconnection.php';
session_start();
include_once "sidebar.php";

if (isset($_POST['btnsave'])) {
    // Get form values
    $student_id      = $_POST['txtlrn'];
    $student_name    = $_POST['txtstudname'];
    $address         = $_POST['txtaddress'];
    $beneficials     = $_POST['txtselect_option'];
    $contact_details = $_POST['txtcontdet'];
    $contact_num     = $_POST['txtcontnum'];
    $Year            = $_POST['txtselect_option1'];
    $Status          = $_POST['txtselect_option2'];

    // File upload handling
    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] == 0) {
        $file_name     = $_FILES['myfile']['name'];
        $file_tmp      = $_FILES['myfile']['tmp_name'];
        $file_size     = $_FILES['myfile']['size'];
        $file_ext      = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        if (!in_array($file_ext, $allowed_extensions)) {
            $_SESSION['status'] = "Only JPG, JPEG, PNG, WEBP, and GIF formats are allowed";
            $_SESSION['status_code'] = "warning";
        } elseif ($file_size > 2000000) { // 2MB max size
            $_SESSION['status'] = "Max file size should be 2MB";
            $_SESSION['status_code'] = "warning";
        } else {
            // Rename file to avoid duplicates
            $new_file_name = uniqid() . "." . $file_ext;
            $file_destination = "images/" . $new_file_name;

            if (move_uploaded_file($file_tmp, $file_destination)) {
                $image = $new_file_name;

                // Corrected Insert Query for Students
                $insert = $pdo->prepare("INSERT INTO student_info (student_id, student_name, address, beneficials, contact_details, contact_num, `Year`, `Status`, image) 
                                         VALUES (:student_id, :student_name, :address, :beneficials, :contact_details, :contact_num, :year, :status, :image)");

                $insert->bindParam(':student_id', $student_id);
                $insert->bindParam(':student_name', $student_name);
                $insert->bindParam(':address', $address);
                $insert->bindParam(':beneficials', $beneficials);
                $insert->bindParam(':contact_details', $contact_details);
                $insert->bindParam(':contact_num', $contact_num);
                $insert->bindParam(':year', $Year);
                $insert->bindParam(':status', $Status);
                $insert->bindParam(':image', $image);

                if ($insert->execute()) {
                    $_SESSION['status'] = "Student added successfully";
                    $_SESSION['status_code'] = "success";
                } else {
                    $_SESSION['status'] = "Student insert failed";
                    $_SESSION['status_code'] = "error";
                }
            } else {
                $_SESSION['status'] = "Failed to upload image";
                $_SESSION['status_code'] = "error";
            }
        }
    } else {
        $_SESSION['status'] = "Please upload an image";
        $_SESSION['status_code'] = "warning";
    }
}
?>


<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Student</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Student Form</h5>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>LRN</label>
                                            <input type="number" class="form-control" placeholder="Enter LRN" name="txtlrn" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" name="txtstudname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Beneficials</label>
                                            <select class="form-control" name="txtselect_option" required>
                                                <option value="" disabled selected>Select Category</option>
                                                <option value="none">None</option>
                                                <option value="Special Scholarship">Special Scholarship</option>
                                                <option value="4P's Beneficiary">4P's Beneficiary</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" placeholder="Enter Address" name="txtaddress" rows="3" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Details</label>
                                            <input type="text" class="form-control" placeholder="Enter Contact Details" name="txtcontdet" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="number" class="form-control" placeholder="Enter Contact Number" name="txtcontnum" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Year Level</label>
                                            <select class="form-control" name="txtselect_option1" required>
                                                <option value="" disabled selected>Select Year Level</option>
                                                <option value="not available">not available</option>
                                                <option value="Special Education Program">Special Education Program</option>
                                                <option value="Kindergarten 1">Kindergarten 1</option>
                                                <option value="SPED Kindergarten 1">SPED Kindergarten 1</option>
                                                <option value="Grade 1">Grade 1</option>
                                                <option value="SPED Grade 1">SPED Grade 1</option>
                                                <option value="Grade 2">Grade 2</option>
                                                <option value="SPED Grade 2">SPED Grade 2</option>
                                                <option value="Grade 3">Grade 3</option>
                                                <option value="SPED Grade 3">SPED Grade 3</option>
                                                <option value="Grade 4">Grade 4</option>
                                                <option value="SPED Grade 4">SPED Grade 4</option>
                                                <option value="Grade 5">Grade 5</option>
                                                <option value="SPED Grade 5">SPED Grade 5</option>
                                                <option value="Grade 6">Grade 6</option>
                                                <option value="SPED Grade 6">SPED Grade 6</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="txtselect_option2" required>
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="Graduated">Graduated</option>
                                                <option value="Promoted/Enrolled">Promoted/Enrolled</option>
                                                <option value="Drop">Drop</option>
                                                <option value="Repeater">Repeater</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>ID Image</label>
                                            <input type="file" class="form-control" name="myfile" required>
                                            <p>Upload an image (Max 2MB, JPG/PNG)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info" name="btnsave">Save Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>

<!-- Alert Handling -->
<?php if (isset($_SESSION['status'])): ?>
<script>
    Swal.fire({
        icon: '<?php echo $_SESSION['status_code']; ?>',
        title: '<?php echo $_SESSION['status']; ?>'
    });
</script>
<?php unset($_SESSION['status']); endif; ?>
