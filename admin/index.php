<?php

/**
 * *****************************************************
 * E-Learning Final Year Project
 * 
 * *****************************************************
 */
session_start();
include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

$company = "";
if($_SESSION["Company"])
    $company = $_SESSION["Company"];
    

/**
 * Setting Data
 */
$setting = $conn->query("SELECT * FROM setting where company = '".$company."' ")->fetch_assoc();


/**
 * Init variables
 */
$total_unfollows = 0;
$total_videos = 0;
$total_classes = 0;
$today_income = 0;
$total_student = 0;
$tomorow_follow = 0;
$installed = 0;
$unfollows = 0;
$conversion = 0;
$conversion_per = 0;

// Current Date
date_default_timezone_set('Asia/Kolkata');
$dat = date("Y-m-d");


/**
 * Total Classes
 */
$today_follow_sql11 = "SELECT COUNT(sno) as amt FROM item_category";
$today_follow_result11 = $conn->query($today_follow_sql11);
while($row = $today_follow_result11->fetch_assoc()) {
    $total_classes = $row["amt"];
}

/**
 * Total Videos
 */
$today_follow_sql = "SELECT COUNT(sno) as no FROM item WHERE type='video' ";
$today_follow_result = $conn->query($today_follow_sql);
while($row = $today_follow_result->fetch_assoc()) {
    $total_videos = $row["no"];
}
/**
 * Total Ebooks
 */
$today_follow_sql12 = "SELECT COUNT(sno) as no FROM item WHERE type='ebook'";
$today_follow_result12 = $conn->query($today_follow_sql12);
while($row = $today_follow_result12->fetch_assoc()) {
    $today_income = $row["no"];
}

/**
 * Total Student
 */
$today_follow_sql12 = "SELECT COUNT(sno) as no FROM student ";
$today_follow_result12 = $conn->query($today_follow_sql12);
while($row = $today_follow_result12->fetch_assoc()) {
    $total_student = $row["no"];
}
    

/**
 * Foramting Graph Data
 */
$monthly = array();
$cart_temp_data = array();
$monthly_sql = "SELECT month(dat) as month, total FROM sales  group by month(dat) order by month(dat)  ";
$monthly_sql_result = $conn->query($monthly_sql);

$month= '';
$month_amt= array();
while($row = $monthly_sql_result->fetch_assoc()) {
    switch($row['month'])
    {
        //"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        case 1:
        {
            $row['month'] = "Jan";
            break;
        }
        case 2:
        {
            $row['month'] = "Feb";
            break;
        }
        case 3:
        {
            $row['month'] = "Mar";
            break;
        }
        case 4:
        {
            $row['month'] = "Apr";
            break;
        }
        case 5:
        {
            $row['month'] = "May";
            break;
        }
        case 6:
        {
            $row['month'] = "Jun";
            break;
        }
        case 7:
        {
            $row['month'] = "Jul";
            break;
        }
        case 8:
        {
            $row['month'] = "Aug";
            break;
        }
        case 9:
        {
            $row['month'] = "Sep";
            break;
        }
        case 10:
        {
            $row['month'] = "Oct";
            break;
        }
        case 11:
        {
            $row['month'] = "Nov";
            break;
        }
        case 12:
        {
            $row['month'] = "Dec";
            break;
        }
    }
    
    
    $num = $row['total'];
    $float = (float)$num;

    array_push($cart_temp_data, $row['month']);
    array_push($month_amt, $float);
        
}

/**
 * Pie Chart Data
 */
$monthly_sql11 = "SELECT category,count(sno) as total FROM lecture where company='".$company."' GROUP BY category";
$monthly_sql_result11 = $conn->query($monthly_sql11);

$revenue= array();
$revenue11= array();
$revenue12= array();

while($row = $monthly_sql_result11->fetch_assoc()) {
    array_push($revenue, $row);
    array_push($revenue11, $row['category']);
    
    $num = $row['total'];
    $float = (float)$num;
    
    array_push($revenue12, $float);
}

// print_r($revenue);

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

    <!-- Sidebar -->
    <?php include('common/header.php'); ?>
    <!-- End of Sidebar -->
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
                            <div class="card border-left-success shadow h-100 py-2">
                                <a href="class-name-master.php" style="text-decoration:none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Courses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r(number_format($total_classes)); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-area-chart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        
                                <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <a href="class-list.php" style="text-decoration:none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Videos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($total_videos); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-video-camera fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <a href="assignment-list.php" style="text-decoration:none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total eBooks
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
                                            <i class="fa fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <a href="student-list.php" style="text-decoration:none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Student
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r(number_format($total_student)); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-group fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
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
    <!--<script src="vendor/chart.js/Chart.min.js"></script>-->

    <!-- Page level custom scripts -->
    <!--<script src="js/demo/chart-area-demo.js"></script>-->
    <!--<script src="js/demo/chart-pie-demo.js"></script>-->
    
    <script>
    
stringCart = JSON.stringify(<?php print_r(json_encode($cart_temp_data)); ?>);
stringMonth = JSON.stringify(<?php print_r(json_encode($month_amt)); ?>);

var xValues = JSON.parse(stringCart);
var yValues = JSON.parse(stringMonth);;

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:<?php print_r(max($month_amt)); ?>}}],
    }
  }
});
</script>
<script>

stringCart11 = JSON.stringify(<?php print_r(json_encode($revenue11)); ?>);
stringMonth11 = JSON.stringify(<?php print_r(json_encode($revenue12)); ?>);

var xValues11 = JSON.parse(stringCart11);
var yValues11 = JSON.parse(stringMonth11);;

console.log(xValues11)
console.log(yValues11)

var barColors11 = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myPieChart", {
  type: "doughnut",
  data: {
    labels: xValues11,
    datasets: [{
      backgroundColor: barColors11,
      data: yValues11
    }]
  },
  options: {
    title: {
      display: true,
    },
    aspectRatio: 1,
    responsive: false,
    maintainAspectRatio: true,
    cutoutPercentage: 70,
    legend: {
        display: true,
        position: 'bottom',
        labels: {
            boxWidth: 20,
            }
        },
  }
});
</script>

</body>

</html>