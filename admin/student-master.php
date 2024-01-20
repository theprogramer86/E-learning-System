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

if($_SESSION["Company"])
    $company = $_SESSION["Company"];

$total_unfollows = 0;

$today_follows = 0;
$total_leads = 0;
$tomorow_follow = 0;
$installed = 0;
$unfollows = 0;
$conversion = 0;




$categoryList = array();

$i_sql_cat = "SELECT category FROM item_category where company = '".$company."'";
$i_result_cat = $conn->query($i_sql_cat);
while($row = $i_result_cat->fetch_assoc()) {
    array_push($categoryList,$row["category"]);
}

if(isset($_POST['update']))
{

    // print_r($_POST);
    // print_r($_FILES["photo"]);
    // die();
    if($_FILES["photo"]["name"] != null)
    {
        $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["photo"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
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
        
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["photo"]["name"]));

      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $newfilename)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        
        $last = 0;
        
        $photo = $target_dir . $newfilename;
    
        $last_sql = "SELECT sno FROM item GROUP BY sno";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $last = $row["sno"] + 1;
        }
        
    
    
        // echo "<pre>";
        // print_r($last);die();
        // $sql = "UPDATE student SET iname =  '".$_POST['iname']."', category =  '".$_POST['category']."', price =  '".$_POST['price']."', photo =  '".$photo."' WHERE sno= '".$_GET['id']."'";
        
        // if ($conn->query($sql) === TRUE) {
        //   echo "<script>window.alert('Updated Successfully')</script>";
        // //   header("location: item_list.php");
        // } else {
        //   echo "Error: " . $sql . "<br>" . $conn->error;
        // }
        
        // $sql = "INSERT INTO item (sno , category , iname , price , photo, company) VALUES ('".$last."', '".$_POST['category']."', '".$_POST['iname']."', '".$_POST['price']."', '".$photo."','".$company."')";
        
        // if ($conn->query($sql) === TRUE) {
        //   echo "<script>window.alert('Saved Successfully')</script>";
        // } else {
        //   echo "Error: " . $sql . "<br>" . $conn->error;
        // }
        
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
        
    } else {
        // echo "<pre>";
        // print_r($last);die();
        $sql = "UPDATE student SET firstname = '".$_POST['firstname']."', midle =  '".$_POST['midle']."', lastname =  '".$_POST['lastname']."', class =  '".$_POST['category']."', password =  '".$_POST['password']."' WHERE username= '".$_POST['sno']."'";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Updated Successfully');</script>";
        //   header("location: item_list.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $last = $last + 1;
}


// print_r($i_name);die();


    

if(isset($_POST['submit']))
{
    // echo '<pre>';
    // print_r($_FILES);
    // print_r($_POST);die();
    
    $status = false;
    
    $i_sql_edit = "SELECT * FROM student where company = '".$company."' and class = '".$_POST['category']."' and username = '".$_POST['username']."' ";
    $i_result_edit = $conn->query($i_sql_edit);
    while($row = $i_result_edit->fetch_assoc()) {
        $status = true;
    }
    
    if($status)
    {
        echo "<script>window.alert('Already Exists!')</script>";
    } else {
        
    
    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    
    
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
        
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["photo"]["name"]));

      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $newfilename)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        
        $last = 0;
        
        $photo = $target_dir . $newfilename;
    
        $last_sql = "SELECT sno FROM item GROUP BY sno";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $last = $row["sno"] + 1;
        }
        
    
    
        // echo "<pre>";
        // print_r($last);die();
        $sql = "INSERT INTO `student`(`firstname`, `midle`, `lastname`, `class`, `photo`, `username`, `password`, `company`) VALUES ('".$_POST['firstname']."', '".$_POST['midle']."', '".$_POST['lastname']."', '".$_POST['category']."', '".$photo."', '".$_POST['username']."', '".$_POST['password']."','".$company."')";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Saved Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
    }
    
    $last = $last + 1;
}


// print_r($area_name);die();

// $leads = array();

// $i_sqlddd = "SELECT * FROM item_category where company = '".$company."'";
//     $i_resultdd = $conn->query($i_sqlddd);
//     while($row = $i_resultdd->fetch_assoc()) {
//         array_push($leads,$row);
//     }
    
    
$category = '';
$iname = '';
$price = '';
$remarks = '';
$photo = '';

if(isset($_GET['type']))
{
    if($_GET['type'] == 'edit')
    {
        $i_sql_edit = "SELECT * FROM student where sno = '".$_GET['id']."' ";
        $i_result_edit = $conn->query($i_sql_edit);
        while($row = $i_result_edit->fetch_assoc()) {
            $category = $row["class"];
            $fname = $row["firstname"];
            $mname = $row["midle"];
            $lname = $row["lastname"];
            $uname = $row["username"];
            $pass = $row["password"];
        }
    }
}

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

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Header -->
    <?php include('common/header.php'); ?>
    <!-- End of Header -->
    
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
                                    <h6 class="m-0 font-weight-bold text-primary">Student Master</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Fistname *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="firstname" id="firstname" value="<?php echo $fname; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Midlename</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="midle" id="midle" value="<?php echo $mname; ?>">
                                                     <input name="sno" type="hidden" value="<?php echo $uname; ?>">
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Lastname *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="lastname" id="lastname" value="<?php echo $lname; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Category</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <select name="category" class="input-box" value="<?php echo $category; ?>">
                                                        <?php
                                                         if($category)
                                                          {
                                                              echo '<option value="'.$category.'">'.$category.'</option>';
                                                          }
                                                          
                                                          foreach($categoryList as $compnay)
                                                          {
                                                              echo '<option value="'.$compnay.'">'.$compnay.'</option>';
                                                          }
                                                          ?>
                                                    </select>
                                                    <!--<input list="iname" class="input-box" name="ename" id="ename" value="<?php echo $ename; ?>">-->
                                                    <!--  <datalist id="iname">-->

                                                    <!--  </datalist>-->
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Email *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input type="email" list="iname" class="input-box" name="username" id="username" value="<?php echo $uname; ?>" <?php if($uname){ echo 'disabled';}; ?> required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Password *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="password" id="password" value="<?php echo $pass; ?>" required>
                                                </div>
                                                <!--<div class="col-xl-2 col-lg-2">-->
                                                <!--    <label for="usr" class="input-lead">Description</label>-->
                                                <!--</div>-->
                                                <!--<div class="col-xl-10 col-lg-10">-->
                                                <!--    <textarea class="input-box" name="desc" id="ename" value="<?php echo $remarks; ?>" ></textarea>-->
                                                <!--</div>-->
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Photo</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input type="file" class="input-box" name="photo" id="ename" value="<?php echo $photo; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row" style="padding: 8px 0px">
                                                <div class="col-xl-2 col-lg-2">
                                                    <!--<label for="usr" class="input-lead">Photo</label>-->
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <?php
                                                    if(!$uname)
                                                    {
                                                        ?>
                                                        <button type="submit" style="width:100%" name="submit" class="btn btn-primary"><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;Save</button>
                                                        <?php
                                                    } else{
                                                        ?>
                                                        <button type="submit" style="width:100%" name="update" class="btn btn-primary"><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;Update</button>
                                                        <?php
                                                    }
                                                    ?>
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