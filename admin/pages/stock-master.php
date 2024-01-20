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


$i_name = array();

$i_sql = "SELECT iname FROM item where company = '".$company."'";
$i_result = $conn->query($i_sql);
while($row = $i_result->fetch_assoc()) {
    array_push($i_name,$row["iname"]);
}

// print_r($i_name);




// print_r($i_name);die();


$category = '';
$iname = '';
$price = '';
$remarks = '';
$photo = '';

    

if(isset($_POST['submit']))
{
    // echo '<pre>';
    // print_r($_FILES);
    // print_r($_POST);die();
    
    $status = false;
    
    $ino = 1;
    
    $stock11 = "SELECT sno FROM item  where iname = '".$_POST['iname']."' and company = '".$company."' ";
    $i_result_edit11 = $conn->query($stock11);
    while($row = $i_result_edit11->fetch_assoc()) {
        $ino = $row['sno'];
    }
    
    $stock = "SELECT ino FROM stock_entry  where iname = '".$_POST['iname']."' and company = '".$company."' ";
    $i_result_edit = $conn->query($stock);
    while($row = $i_result_edit->fetch_assoc()) {
        $status = true;
    }
    
    if($status)
    {
        $sql123 = "INSERT INTO stock_entry (dat, iname, ino , quan , remarks, company) VALUES ('".date('Y-m-d')."','".$_POST['iname']."', '".$ino."', '".$_POST['qty']."', '".$_POST['remark']."','".$company."')";
        
        $conn->query($sql123);
        
        $sql = "UPDATE stock  SET quan=quan+ '".$_POST['qty']."' WHERE iname='".$_POST['iname']."' AND ino ='".$ino."' AND company='".$company."' ";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Updated Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    } else {
        
        // echo "<pre>";
        // print_r($last);die();
        
        $sql123 = "INSERT INTO stock (iname, ino , quan , company) VALUES ('".$_POST['iname']."', '".$ino."', '".$_POST['qty']."','".$company."')";
        
        $conn->query($sql123);
            
        $sql = "INSERT INTO stock_entry (dat, iname, ino , quan , remarks, company) VALUES ('".date('Y-m-d')."','".$_POST['iname']."', '".$ino."', '".$_POST['qty']."', '".$_POST['remark']."','".$company."')";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Saved Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
                                    <h6 class="m-0 font-weight-bold text-primary">Stock Entry</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Item Name</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                      <select name="iname" id="iname" class="form-control form-control-user" required>
                                                          <?php
                                                          foreach($i_name as $compnay)
                                                          {
                                                              echo '<option value="'.$compnay.'">'.$compnay.'</option>';
                                                          }
                                                          ?>
                                                      </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Qty</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <input class="input-box" name="qty" id="ename" value="<?php echo $ename; ?>" required>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Remarks</label>
                                                </div>
                                                <div class="col-xl-10 col-lg-10">
                                                    <textarea name="remark" id="remark" style="width:100%;outline: #ededeb solid 1px;padding: 10px;border: 1px solid #ededeb"><?php echo $remark; ?></textarea>
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