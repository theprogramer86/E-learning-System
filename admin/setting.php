<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

date_default_timezone_set('Asia/Kolkata');

$company = '';
$ename = '';
$user = '';

if($_SESSION["Company"])
    $company = $_SESSION["Company"];
    
if($_SESSION["Username"])
    $user = $_SESSION["Username"];



$i_name = array();

if(isset($_POST['img_submit']))
{
    $sql = "UPDATE setting SET img='' WHERE company='".$company."' ";
            
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('Updated Successfully')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if(isset($_POST['submit']))
{
    $web_logo = '';
    $app_logo = '';
    $temp_img = '';

    if($_FILES["web_logo"]["name"])
    {
        $target_dir = "uploads/";

        $target_file = $target_dir . basename($_FILES["web_logo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
          $check = getimagesize($_FILES["web_logo"]["tmp_name"]);
          if($check !== false) {
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["web_logo"]["name"]));
    
          if (move_uploaded_file($_FILES["web_logo"]["tmp_name"], $target_dir . $newfilename)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            
            $last = 0;
            
            $web_logo = $target_dir . $newfilename;
            
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    } 
    
    if($_FILES["app_logo"]["name"])
    {
        $target_dir1 = "uploads/";

        $target_file1 = $target_dir1 . basename($_FILES["app_logo"]["name"]);
        $uploadOk1 = 1;
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
          $check1 = getimagesize($_FILES["app_logo"]["tmp_name"]);
          if($check1 !== false) {
            $uploadOk1 = 1;
          } else {
            echo "File is not an image.";
            $uploadOk1 = 0;
          }
        
        // Check if file already exists
        if (file_exists($target_file1)) {
          echo "Sorry, file already exists.";
          $uploadOk1 = 0;
        }
        
        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk1 = 0;
        }
        
        // Allow certain file formats
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
        && $imageFileType1 != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk1 = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk1 == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            $newfilename1= date('dmYHis').str_replace(" ", "", basename($_FILES["app_logo"]["name"]));
    
          if (move_uploaded_file($_FILES["app_logo"]["tmp_name"], $target_dir1 . $newfilename1)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            
            
            $app_logo = $target_dir1 . $newfilename1;
            
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    } 
    
    if($_FILES["img"]["name"])
    {
        $target_dir11 = "uploads/";

        $target_file11 = $target_dir11 . basename($_FILES["img"]["name"]);
        $uploadOk11 = 1;
        $imageFileType11 = strtolower(pathinfo($target_file11,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
          $check11 = getimagesize($_FILES["img"]["tmp_name"]);
          if($check11 !== false) {
            $uploadOk11 = 1;
          } else {
            echo "File is not an image.";
            $uploadOk11 = 0;
          }
        
        // Check if file already exists
        if (file_exists($target_file11)) {
          echo "Sorry, file already exists.";
          $uploadOk1 = 0;
        }
        
        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk11 = 0;
        }
        
        // Allow certain file formats
        if($imageFileType11 != "jpg" && $imageFileType11 != "png" && $imageFileType11 != "jpeg"
        && $imageFileType11 != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk1 = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk11 == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            $newfilename11= date('dmYHis').str_replace(" ", "", basename($_FILES["app_logo"]["name"]));
    
          if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir11 . $newfilename11)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            
            
            $temp_img = $target_dir11 . $newfilename11;
            
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    } 

    $status = 0;
    $i_sql = "SELECT * FROM setting where company = '".$company."'";
    $i_result = $conn->query($i_sql);
    while($row = $i_result->fetch_assoc()) {
        $status = 1;
    }
    
    
    if($status == 1)
    {
        
        if($web_logo)
        {
            $sql = "UPDATE setting SET web_logo='".$web_logo."' WHERE company='".$company."' ";
            $conn->query($sql);
        }
        if($app_logo) {
            $sql = "UPDATE setting SET app_logo='".$app_logo."' WHERE company='".$company."' ";
            $conn->query($sql);
        }
        if($temp_img) {
            $sql = "UPDATE setting SET img='".$temp_img."' WHERE company='".$company."' ";
            $conn->query($sql);
        }
        
        $sql = "UPDATE setting SET cname ='".$_POST['cname']."' , add1 = '".$_POST['add1']."' , add2 = '".$_POST['add2']."', add3= '".$_POST['add3']."', add4= '".$_POST['add4']."', add5 = '".$_POST['add5']."', bill_format ='".$_POST['bill_format']."', copies ='".$_POST['copies']."', bill_head='".$_POST['bill_head']."' , curency='".$_POST['curency']."' , msg='".$_POST['msg']."' WHERE company='".$company."' ";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Updated Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    } else {
        
        
        $sql = "INSERT INTO setting (company , cname , add1 , add2 , add3, add4, add5 , bill_format , copies , bill_head, curency, msg , web_logo, app_logo) VALUES ('".$company."', '".$_POST['cname']."', '".$_POST['add1']."', '".$_POST['add2']."', '".$_POST['add3']."', '".$_POST['add4']."', '".$_POST['add5']."', '".$_POST['bill_format']."', '".$_POST['copies']."', '".$_POST['bill_head']."' , '".$_POST['curency']."', '".$_POST['msg']."', '".$web_logo."','')";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Saved Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}



$i_sql = "SELECT * FROM setting where company = '".$company."'";
$i_result = $conn->query($i_sql);
while($row = $i_result->fetch_assoc()) {
    $i_name = $row;
}

// print_r($i_name);die();





?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    
    <!-- Header -->
    <?php include('common/header.php'); ?>
    <!-- End of Header -->

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .input-box{
            margin: 10px 0px;
            padding: 5px;
            width: 100%;
            border:1px solid silver;
            border-radius: 5px;
        }
        .input-lead{
            margin: 10px;
        }
        .input-box:focus{
            margin: 10px 0px;
            width: 100%;
            border:1px solid silver;
            border-radius: 5px;
            outline: none;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('common/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                    <!-- Topbar Navbar -->
                    <?php include("common/menu.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">-->
                    <!--    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>-->
                    <!--    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i-->
                    <!--            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    <!--</div>-->


                    <!-- Content Row -->

                    <div class="row">
                <form action="" method="POST" style="width:100%" enctype="multipart/form-data">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <!--<div class="col-xl-2 col-lg-2">-->
                                                <!--    <label for="usr" class="input-lead">Company Name</label>-->
                                                <!--</div>-->
                                                <!--<div class="col-xl-4 col-lg-4">-->
                                                <!--    <input type="text" class="input-box" name="company" id="company" value="<?php echo $company; ?>" disabled>-->
                                                <!--</div>-->
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Company Name</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input type="text" class="input-box" name="cname" id="cname" value="<?php echo $i_name?$i_name['cname']:''; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Address</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input type="text" class="input-box" name="add1" id="add1" value="<?php echo $i_name?$i_name['add1']:''; ?>">
                                                    <br>
                                                    <input type="text" class="input-box" name="add2" id="add2" value="<?php echo $i_name?$i_name['add2']:''; ?>">
                                                    <br>
                                                    <input type="text" class="input-box" name="add3" id="add3" value="<?php echo $i_name?$i_name['add3']:''; ?>">
                                                    <br>
                                                    <input type="text" class="input-box" name="add4" id="add4" value="<?php echo $i_name?$i_name['add4']:''; ?>">
                                                    <br>
                                                    <input type="text" class="input-box" name="add5" id="add5" value="<?php echo $i_name?$i_name['add5']:''; ?>">
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Bill Format</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                      <select type="date" class="input-box" placeholder="Type here" name="bill_format" required>
                                                          <option value="Bill Format 1">Bill Format 1</option>
                                                          <option value="Bill Format 2">Bill Format 2</option>
                                                     </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Copies</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="input-box" name="copies" id="copies" value="<?php echo $i_name?$i_name['copies']:''; ?>" >
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Bill Head</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="input-box" name="bill_head" id="bill_head" value="<?php echo $i_name?$i_name['bill_head']:''; ?>">
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Currency</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="input-box" name="curency" id="curency" value="<?php echo $i_name?$i_name['curency']:''; ?>">
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Message</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input type="text" class="input-box" name="msg" id="msg" value="<?php echo $i_name?$i_name['msg']:''; ?>">
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Web Logo</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="file" class="input-box" name="web_logo" id="web_logo" value="<?php echo $i_name?$i_name['web_logo']:''; ?>">
                                                    <img src="http://koolpos.eshop.life/<?php echo $i_name['web_logo']?$i_name['web_logo']:'img/upload.jpg'; ?>" style="height: 150px; width: 150px; border: 1px solid silver; border-radius: 10px" >
                                                    <!--<i class="fa fa-trash"></i>-->
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">App Logo</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="file" class="input-box" name="app_logo" id="app_logo" value="<?php echo $i_name?$i_name['app_logo']:''; ?>">
                                                    <img src="http://koolpos.eshop.life/<?php echo $i_name['app_logo']?$i_name['app_logo']:'img/upload.jpg'; ?>" style="height: 150px; width: 150px; border: 1px solid silver; border-radius: 10px" >
                                                    <!--<i class="fa fa-trash"></i>-->
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Image</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="file" class="input-box" name="img" id="img" value="<?php echo $i_name?$i_name['img']:''; ?>">
                                                    <img src="http://koolpos.eshop.life/<?php echo $i_name['img']?$i_name['img']:'img/upload.jpg'; ?>" style="height: 150px; width: 150px; border: 1px solid silver; border-radius: 10px" >
                                                    <?php echo $i_name['img']?'<button type="submit" name="img_submit"  class="btn btn-primary"><i class="fa fa-trash"></i> Reset</button>':''; ?>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row" style="padding: 8px 0px">
                                                <div class="col-xl-2 col-lg-2">
                                                    <!--<label for="usr" class="input-lead">Photo</label>-->
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <button type="submit" style="width:100%" name="submit" class="btn btn-primary"><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;Save</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                
                                <!-- Card Body -->
    <!--                            <div class="card-body">-->
    <!--                                <table id="example" class="table table-striped table-bordered" style="width:100%">-->
    <!--    <thead>-->
    <!--        <tr>-->
    <!--            <th>Sr No</th>-->
    <!--            <th>Category </th>-->
    <!--            <th>Company</th>-->
    <!--            <th>Action</th>-->
    <!--        </tr>-->
    <!--    </thead>-->
    <!--    <tbody>-->
    <!--    </tbody>-->
    <!--</table>-->
    <!--                                </div>-->
                                    </div>
                        </div>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            
            include("common/footer.php")
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
        "order": [[ 0, "desc" ]],
        "pageLength": 10
    });
        } );
    </script>

</body>

</html>