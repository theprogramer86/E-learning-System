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

$i_sql = "SELECT * FROM lead_entry GROUP BY iname";
$i_result = $conn->query($i_sql);
while($row = $i_result->fetch_assoc()) {
    array_push($i_name,$row["iname"]);
}

$company_name = array();

$company_sql = "SELECT * FROM lead_entry GROUP BY company";
$company_result = $conn->query($company_sql);
while($row = $company_result->fetch_assoc()) {
    array_push($company_name,$row["company"]);
}

$country_name = array();

$country_sql = "SELECT * FROM lead_entry GROUP BY country";
$country_result = $conn->query($country_sql);
while($row = $country_result->fetch_assoc()) {
    array_push($country_name,$row["country"]);
}

$cp_name = array();

$cp_sql = "SELECT * FROM lead_entry GROUP BY cname";
$cp_result = $conn->query($cp_sql);
while($row = $cp_result->fetch_assoc()) {
    array_push($cp_name,$row["cname"]);
}


$ccode = array();

$ccode_sql = "SELECT * FROM lead_entry GROUP BY ccode";
$ccode_result = $conn->query($ccode_sql);
while($row = $ccode_result->fetch_assoc()) {
    array_push($ccode,$row["ccode"]);
}

$mobile_name = array();

$mobile_sql = "SELECT * FROM lead_entry GROUP BY mobile";
$mobile_result = $conn->query($mobile_sql);
while($row = $mobile_result->fetch_assoc()) {
    array_push($mobile_name,$row["mobile"]);
}

$altmobile_name = array();

$altmobile_sql = "SELECT * FROM lead_entry GROUP BY phone";
$altmobile_result = $conn->query($altmobile_sql);
while($row = $altmobile_result->fetch_assoc()) {
    array_push($altmobile_name,$row["phone"]);
}

$area_name = array();

$area_sql = "SELECT * FROM lead_entry GROUP BY area";
$area_result = $conn->query($area_sql);
while($row = $area_result->fetch_assoc()) {
    array_push($area_name,$row["area"]);
}


$add_name = array();

$add_sql = "SELECT * FROM lead_entry GROUP BY address";
$add_result = $conn->query($add_sql);
while($row = $add_result->fetch_assoc()) {
    array_push($add_name,$row["address"]);
}

$reff_name = array();

$reff_sql = "SELECT * FROM lead_entry GROUP BY ref";
$reff_result = $conn->query($reff_sql);
while($row = $reff_result->fetch_assoc()) {
    array_push($reff_name,$row["ref"]);
}


$source_name = array();

$source_sql = "SELECT * FROM lead_entry GROUP BY source";
$source_result = $conn->query($source_sql);
while($row = $source_result->fetch_assoc()) {
    array_push($source_name,$row["source"]);
}


$last = 0;
    
$last_sql = "SELECT * FROM lead_entry GROUP BY sno";
$last_result = $conn->query($last_sql);
while($row = $last_result->fetch_assoc()) {
    $last = $row["sno"] + 1;
}
    

if(isset($_POST['submit']))
{
    
    // echo "<pre>";
    // print_r($last);die();
    $sql = "INSERT INTO lead_entry (sno, dat, tim, cat, iname, company, cname, country, ccode, mobile, phone, area, address, ref, source, status, ratio, fdate,ndate, remarks, user, last)
    VALUES ('".$last."',
                '".$_POST['cdate']."',
                '".$_POST['ctime']."',
                '".$_POST['category']."',
                '".$_POST['software']."',
                '".$_POST['cname']."',
                '".$_POST['cperson']."',
                '".$_POST['country']."',
                '".$_POST['ccode']."',
                '".$_POST['mobile']."',
                '".$_POST['phone']."',
                '".$_POST['area']."',
                '".$_POST['address']."',
                '".$_POST['reff']."',
                '".$_POST['source']."',
                '".$_POST['status']."',
                '".$_POST['ratio']."',
                '".$_POST['nfd']."',
                '".date('Y-m-d')."',
                '".$_POST['remark']."',
                '".$_SESSION["Username"]."',
                '".date("d-m-Y h:i:s A")."'
                )";
    
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

    <title>Selrom Software</title>

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
                                    <h6 class="m-0 font-weight-bold text-primary">Lead Entry</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Lead Number</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" name="lno" class="input-box" id="usr" value="<?php echo $last; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Date</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="input-box" name="cdate" id="usr" value="<?php echo date("Y-m-d"); ?>">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="input-box" name="ctime" id="usr" value="<?php echo date("h:i:s A"); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Category</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8" style="padding: 10px 10px">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <select class="form-control" name="category" id="sel1">
                                                        <option>Edy Fly</option>
                                                        <option>Health Fly</option>
                                                        <option>Wonder POS</option>
                                                        <option>Mobile Apps</option>
                                                        <option>Ecommerce</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Software</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                     <input list="iname" class="input-box" name="software" id="browser">
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
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Company Name</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="companyName" class="input-box" name="cname" id="browser">
                                                      <datalist id="companyName">
                                                          <?php
                                                          foreach($company_name as $compnay)
                                                          {
                                                              echo '<option value="'.$compnay.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Contact Person</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    
                                                    <input list="browser11" class="input-box" name="cperson" id="browser">
                                                      <datalist id="browser11">
                                                          <?php
                                                          foreach($cp_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Country</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                      <input list="country" class="input-box" name="country" id="browser">
                                                      <datalist id="country">
                                                          <?php
                                                          foreach($country_name as $country)
                                                          {
                                                              echo '<option value="'.$country.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Country Code</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="ccode" class="input-box" name="ccode" id="browser">
                                                      <datalist id="ccode">
                                                          <?php
                                                          foreach($ccode as $cc)
                                                          {
                                                              echo '<option value="'.$cc.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div><div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Mobile</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="browserMobile" class="input-box" name="mobile" id="browser">
                                                      <datalist id="browserMobile">
                                                          <?php
                                                          foreach($mobile_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Alt Cont</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="browserAltMobile" class="input-box" name="phone" id="browser">
                                                      <datalist id="browserAltMobile">
                                                          <?php
                                                          foreach($altmobile_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Area/ city</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="browserArea" class="input-box" name="area" id="browser">
                                                      <datalist id="browserArea">
                                                          <?php
                                                          foreach($area_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Address</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="browserAddress" class="input-box" name="address" id="browser">
                                                      <datalist id="browserAddress">
                                                          <?php
                                                          foreach($add_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Reference</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="browserReff" class="input-box" name="reff" id="browser">
                                                      <datalist id="browserReff">
                                                          <?php
                                                          foreach($reff_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Source</label>
                                                    
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <input list="browserSource" class="input-box" name="source" id="browser">
                                                      <datalist id="browserSource">
                                                          <?php
                                                          foreach($source_name as $cp)
                                                          {
                                                              echo '<option value="'.$cp.'">';
                                                          }
                                                          ?>
                                                      </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Status</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8" style="padding: 10px 10px">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <select class="form-control" name="status" id="sel1">
                                                        <option value="Following">Following</option>
                                                        <option value="Completed /Installed">Completed/ Installed</option>
                                                        <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Conversion ratio</label>
                                                </div>
                                               <div class="col-xl-8 col-lg-8" style="padding: 10px 10px">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <select class="form-control" id="sel1" name="ratio">
                                                        <option value="100% - Confimed">100% - Confimed</option>
                                                        <option value="75%  - Almost Confimed">75%  - Almost Confimed</option>
                                                        <option value="50%  - Maybe Confimed">50%  - Maybe Confimed</option>
                                                        <option value="25%  - Just Following">25%  - Just Following</option>
                                                        <option value="0%   - Others">0%   - Others</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Next Follow Date</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="date" name="nfd" class="input-box" id="usr">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Remark</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" name="remark" class="input-box" id="usr">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <br>
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
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6">
                                                    <button type="button" style="width:100%" class="btn btn-info"> <i class="fa fa-toggle-left"></i> &nbsp;&nbsp;&nbsp;Last</button>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <button type="button" style="width:100%" class="btn btn-info">Next &nbsp;&nbsp;&nbsp; <i class="fa fa-toggle-right"></i></button>
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