<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

date_default_timezone_set('Asia/Kolkata');


$total_unfollows = 0;

$today_follows = 0;
$total_leads = 0;
$tomorow_follow = 0;
$installed = 0;
$unfollows = 0;
$conversion = 0;


$i_name = array();

$i_sql = "SELECT ename FROM employee_master";
$i_result = $conn->query($i_sql);
while($row = $i_result->fetch_assoc()) {
    array_push($i_name,$row["ename"]);
}

// print_r($i_name);die();
    

if(isset($_POST['submit']))
{
    $last = 0;
    
    $last_sql = "SELECT sno FROM work_entry GROUP BY sno";
    $last_result = $conn->query($last_sql);
    while($row = $last_result->fetch_assoc()) {
        $last = $row["sno"] + 1;
    }
    
    // echo "<pre>";
    // print_r($last);die();
    $sql = "INSERT INTO work_entry (sno , dat , ename, status) VALUES ('".$last."', '".date('Y-m-d')."', '".$_POST['ename']."','".$_POST['status']."')";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('New record created successfully')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $last = $last + 1;
}
// print_r($area_name);die();


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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
<form action="" method="POST">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Work Entry</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Name</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input list="iname" class="input-box" name="ename" id="ename">
                                                      <datalist id="iname">
                                                          <?php
                                                          foreach($i_name as $compnay)
                                                          {
                                                              echo '<option value="'.$compnay.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Yes / No</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8" style="padding: 10px 10px">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <select class="form-control" name="status" id="sel1">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-xl-12 col-lg-12">
                                            <br>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6">
                                                    <button type="submit" style="width:100%" name="submit" class="btn btn-primary"><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;Save</button>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <button type="reset" style="width:100%" class="btn btn-danger"><i class="fa fa-times-circle-o"></i> &nbsp;&nbsp;&nbsp;Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
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

</body>

</html>