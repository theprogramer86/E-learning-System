<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

date_default_timezone_set('Asia/Kolkata');

$company = "";
if($_SESSION["Company"])
    $company = $_SESSION["Company"];

// print_r($company);die();
$total_unfollows = 0;

$today_bills = 0;
$today_sales = 0;
$today_income = 0;
$today_expence = 0;

$tomorow_follow = 0;
$installed = 0;
$unfollows = 0;
$conversion = 0;

$conversion_per = 0;

$dat = date("Y-m-d");

// if($_SESSION["UserType"] == "User")
// {
    
    $today_follow_sql = "SELECT COUNT(billno) as no FROM sales WHERE dat='".$dat."' AND company='".$company."' ";
    $today_follow_result = $conn->query($today_follow_sql);
    while($row = $today_follow_result->fetch_assoc()) {
        $today_bills = $row["no"];
    }
    // print_r($today_follows);die();
    
    
    $today_follow_sql11 = "SELECT sum(amount) as amt FROM sales WHERE dat='".$dat."' AND company='".$company."' ";
    $today_follow_result11 = $conn->query($today_follow_sql11);
    while($row = $today_follow_result11->fetch_assoc()) {
        $today_sales = $row["amt"];
    }
    //  print_r($today_sales);die();
     
    $today_follow_sql12 = "SELECT sum(debit) as no FROM voucher_daybook WHERE dat='".$dat."' AND company='".$company."' ";
    $today_follow_result12 = $conn->query($today_follow_sql12);
    while($row = $today_follow_result12->fetch_assoc()) {
        $today_income = $row["no"];
    }
    
    $today_follow_sql12 = "SELECT sum(credit) as no FROM voucher_daybook WHERE dat='".$dat."' AND company='".$company."' ";
    $today_follow_result12 = $conn->query($today_follow_sql12);
    while($row = $today_follow_result12->fetch_assoc()) {
        $today_expence = $row["no"];
    }
    // print_r($today_follow_sql12);die();
    
    
    
//     $today_follow_sql = "SELECT count(dat) as no FROM lead_entry  WHERE fdate < '".date('Y-m-d')."' and user='".$_SESSION["Username"]."' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $unfollows = $row["no"];
//         $_SESSION["unfollows"] = $unfollows;
//     }
    
//     $today_follow_sql = "SELECT count(status) as no FROM lead_entry  WHERE status = 'Completed /Installed' and user='".$_SESSION["Username"]."' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $installed = $row["no"];
//     }
    
//     $today_follow_sql = "SELECT count(ratio) as no FROM lead_entry  WHERE ratio = '100% - Confimed' and user='".$_SESSION["Username"]."' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $conversion = $row["no"];
//     }

// } else {
//     $today_follow_sql = "SELECT count(dat) as no FROM lead_entry  WHERE fdate='".date('Y-m-d')."' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $today_follows = $row["no"];
//     }
    
//      $today_follow_sql = "SELECT count(dat) as no FROM lead_entry  WHERE fdate='".date('Y-m-d', strtotime(' +1 day'))."'  and user='".$_SESSION["Username"]."' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $tomorow_follow = $row["no"];
//     }
    
    
//     $today_follow_sql = "SELECT count(dat) as no FROM lead_entry";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $total_leads = $row["no"];
//     }
    
//     $today_follow_sql = "SELECT count(dat) as no FROM lead_entry  WHERE fdate < '".date('Y-m-d')."' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $unfollows = $row["no"];
//         $_SESSION["unfollows"] = $unfollows;
//     }
    
//     $today_follow_sql = "SELECT count(status) as no FROM lead_entry  WHERE status = 'Completed /Installed' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $installed = $row["no"];
//     }
    
//     $today_follow_sql = "SELECT count(ratio) as no FROM lead_entry  WHERE ratio = '100% - Confimed' ";
//     $today_follow_result = $conn->query($today_follow_sql);
//     while($row = $today_follow_result->fetch_assoc()) {
//         $conversion = $row["no"];
//     }
// }

// $conversion_per = ($conversion/$total_leads)*100

// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GrowsoftTechnologies</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                        <img src="img/bot.gif" height="100px">
                                    </div>
                                    <div>
                                        Hey <b><?php echo $_SESSION["Username"]?$_SESSION["Username"]:''; ?></b>, 
                                        <?php 
                                        $time = date("H");
                                        
                                        // echo $time;
                                        
                                        if($time < 12)
                                        {
                                            echo "<b>Good Morning</b>"; 
                                        } else if( ($time >= 12) && ($time < 16)){
                                            echo "<b>Good Afternoon</b>"; 
                                        } else if( ($time >= 16) && ($time < 20)){
                                            echo "<b>Good Evening</b>"; 
                                        } else {
                                            echo "<b>Good Night</b>"; 
                                        }
                                        
                                        ?>
                                        
                                        
                                    </div>
                                    <br>
                                    <div>
                                        <br><br>
                                            <!--<b >Alert (Urgent)</b>:You Have <a href="unfollow-list.php" style="text-decoration:none"><b style="color: red"><?php print_r($unfollows); ?> unfollows</b></a>, Fallow them now.-->
                                        </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xl-8 col-md-6 mb-4">
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <a href="today-follow-list.php" style="text-decoration:none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Today Bills</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($today_bills); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <a href="lead-report.php" style="text-decoration:none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Today SALES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r(number_format($today_sales)); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Today Income
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php print_r(number_format($today_income)); ?></div>
                                                </div>
                                                <div class="col">
                                                    <!--<div class="progress progress-sm mr-2">-->
                                                    <!--    <div class="progress-bar bg-info" role="progressbar"-->
                                                    <!--        style="width: 50%" aria-valuenow="50" aria-valuemin="0"-->
                                                    <!--        aria-valuemax="100"></div>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Today Expence
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r(number_format($today_expence)); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            </div>
                        </div>
                    </div>
                        

                        

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Leads Overview</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
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