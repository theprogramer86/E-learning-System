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


$loading = false;

$i_name = array();

$i_sql = "SELECT iname FROM item where company = '".$company."'";
$i_result = $conn->query($i_sql);
while($row = $i_result->fetch_assoc()) {
    array_push($i_name,$row["iname"]);
}


$categoryList = array();

$i_sql_cat = "SELECT category FROM item_category where company = '".$company."'";
$i_result_cat = $conn->query($i_sql_cat);
while($row = $i_result_cat->fetch_assoc()) {
    array_push($categoryList,$row["category"]);
}

if(isset($_POST['update']))
{
    $loading = true;

    $photo = '';
    $photo1 = '';

    
    if($_FILES["photo1"]["name"])
    {
        $target_dir1 = "uploads/";

        $target_file1 = $target_dir1 . basename($_FILES["photo1"]["name"]);
        $uploadOk1 = 1;
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
          $check1 = getimagesize($_FILES["photo1"]["tmp_name"]);
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
        
        
        // Allow certain file formats
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
        && $imageFileType1 != "gif" ) {
        //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
          $uploadOk1 = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk1 == 0) {
            echo "<script>window.alert('Sorry, your file was not uploaded')</script>";
        //   echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            $newfilename1= date('dmYHis').str_replace(" ", "", basename($_FILES["photo1"]["name"]));
    
          if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_dir1 . $newfilename1)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            
            
            $photo1 = $target_dir1 . $newfilename1;
            
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    } 
    
    if($photo1) {
        $sql = "UPDATE item SET thumb='".$photo1."' WHERE sno= '".$_GET['id']."' ";
        $conn->query($sql);
    }
    
    $sql = "UPDATE item SET iname =  '".$_POST['iname']."', category =  '".$_POST['category']."', price =  '".$_POST['price']."', photo =  '".$_POST['photo']."',author =  '".$_POST['author']."',publisher =  '".$_POST['publisher']."',place =  '".$_POST['place']."',year =  '".$_POST['year']."',totalpages =  '".$_POST['totalpages']."',language =  '".$_POST['language']."' WHERE sno= '".$_GET['id']."'";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('Updated Successfully');window.location.href = 'class-list.php';</script>";
        //   header("location: item_list.php");
        $loading = false;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// print_r($i_name);die();


$category = '';
$iname = '';
$price = '';
$remarks = '';
$photo = '';

$thumb ='';
$author=''; 
$publisher=''; 
$place=''; 
$year=''; 
$totalpages=''; 
$language='';

if(isset($_GET['type']))
{
    if($_GET['type'] == 'edit')
    {
        $i_sql_edit = "SELECT * FROM item where company = '".$company."' and sno = '".$_GET['id']."' ";
        $i_result_edit = $conn->query($i_sql_edit);
        while($row = $i_result_edit->fetch_assoc()) {
            $category = $row["category"];
            $iname = $row["iname"];
            $price = $row["price"];
            $photo = $row["photo"];
            $thumb =$row["thumb"];
            $author=$row["author"];
            $publisher=$row["publisher"];
            $place=$row["place"];
            $year=$row["year"];
            $totalpages=$row["totalpages"];
            $language=$row["language"];
        }
    }
}
    

if(isset($_POST['submit']))
{
    echo '<div style="height:100%;width:100%;background:rgba(0,0,0,0.5);position: absolute;z-index:1000;"><div style="width:300px;margin:100px auto;background: white;padding: 50px; text-align: center;"><img src="img/loading.gif" width="100%"> <h6>Uploading... Please Wait...!!</h6></div></div>';
    // echo '<pre>';
    // print_r($_FILES);
    // print_r($_POST);
    
    $status = false;
    
    $i_sql_edit = "SELECT * FROM item where company = '".$company."' and category = '".$_POST['category']."' and iname = '".$_POST['iname']."' ";
    $i_result_edit = $conn->query($i_sql_edit);
    while($row = $i_result_edit->fetch_assoc()) {
        $status = true;
    }
    
    if($status)
    {
        echo "<script>window.alert('Already Exists!')</script>";
    } else {
        
        
    $photo = '';
    $photo1 = '';

    
    if($_FILES["photo1"]["name"])
    {
        $target_dir1 = "uploads/";

        $target_file1 = $target_dir1 . basename($_FILES["photo1"]["name"]);
        $uploadOk1 = 1;
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
          $check1 = getimagesize($_FILES["photo1"]["tmp_name"]);
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
        
        
        // Allow certain file formats
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
        && $imageFileType1 != "gif" ) {
        //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
          $uploadOk1 = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk1 == 0) {
            echo "<script>window.alert('Sorry, your file was not uploaded')</script>";
        //   echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            $newfilename1= date('dmYHis').str_replace(" ", "", basename($_FILES["photo1"]["name"]));
    
          if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_dir1 . $newfilename1)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            
            
            $photo1 = $target_dir1 . $newfilename1;
            
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    } 
    
    $sql = "INSERT INTO item (category , type, iname , price , photo, thumb, author, publisher, place, year, totalpages, language,  company) VALUES ( '".$_POST['category']."','video', '".$_POST['iname']."', '".$_POST['price']."', '".$_POST['photo']."', '".$photo1."', '".$_POST['author']."', '".$_POST['publisher']."', '".$_POST['place']."', '".$_POST['year']."', '".$_POST['totalpages']."', '".$_POST['language']."','".$company."')";
        
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('Saved Successfully');window.location.href = 'class-list.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    }
}

// print_r($area_name);die();

// $leads = array();

// $i_sqlddd = "SELECT * FROM item_category where company = '".$company."'";
//     $i_resultdd = $conn->query($i_sqlddd);
//     while($row = $i_resultdd->fetch_assoc()) {
//         array_push($leads,$row);
//     }
    

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
                                    <h6 class="m-0 font-weight-bold text-primary">Video Master</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Title *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="iname" id="iname" value="<?php echo $iname; ?>" required>
                                                      <datalist id="iname">
                                                          <?php
                                                          foreach($i_name as $compnay)
                                                          {
                                                              echo '<option value="'.$compnay.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Class *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <select name="category" class="input-box" value="<?php echo $category; ?>" required>
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
                                                    <label for="usr" class="input-lead">Publisher: *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="publisher" id="publisher" value="<?php echo $publisher; ?>" required>
                                                     <input type="hidden" class="input-box" name="totalpages" value="1" id="totalpages" value="<?php echo $totalpages; ?>" required>
                                                     <input type="hidden" class="input-box" name="author" value="1" id="author" value="<?php echo $author; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Place of Publication: *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="place" id="place" value="<?php echo $place; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Publication year: *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                     <input list="iname" class="input-box" name="year" id="year" value="<?php echo $year; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Language: *</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <select name="language" class="input-box" value="<?php echo $language; ?>" required>
                                                         <option value="English">English</option>
                                                         <option value="Nepali">Nepali</option>
                                                         <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Description *</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <textarea class="input-box" name="price" id="ename" required><?php echo $price; ?></textarea>
                                                </div>
                                                <!--<div class="col-xl-2 col-lg-2">-->
                                                <!--    <label for="usr" class="input-lead">Description</label>-->
                                                <!--</div>-->
                                                <!--<div class="col-xl-10 col-lg-10">-->
                                                <!--    <textarea class="input-box" name="desc" id="ename" value="<?php echo $remarks; ?>" ></textarea>-->
                                                <!--</div>-->
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Video Link *</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input type="text" class="input-box" name="photo" id="ename" value="<?php echo $photo; ?>" <?php if(!$iname) { echo 'required'; } ?>>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Thumbnail *</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input type="file" class="input-box" name="photo1" id="ename" value="<?php echo $photo1; ?>" <?php if(!$iname) { echo 'required'; } ?>>
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
                                                    if(!$iname)
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