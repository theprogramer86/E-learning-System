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

$total_unfollows = 0;

$today_follows = 0;
$total_leads = 0;
$tomorow_follow = 0;
$installed = 0;
$unfollows = 0;
$conversion = 0;


if(isset($_POST['update']))
{

    
        // echo "<pre>";
        // print_r($last);die();
        $sql = "UPDATE voucher SET part =  '".$_POST['iname']."',amount =  '".$_POST['amt']."',pby =  '".$_POST['pby']."',remarks =  '".$_POST['remark']."' WHERE sno= '".$_GET['id']."'";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Updated Successfully')</script>";
        //   header("location: category.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    $last = $last + 1;
}

$part = '';
$amount = '';
$pby = '';
$remarks = '';
$dat = '';

if(isset($_GET['type']))
{
    if($_GET['type'] == 'edit')
    {
        $i_sql_edit = "SELECT * FROM voucher where company = '".$company."' and sno = '".$_GET['id']."' ";
        $i_result_edit = $conn->query($i_sql_edit);
        while($row = $i_result_edit->fetch_assoc()) {
            $dat = $row["dat"];
            $part = $row["part"];
            $amount = $row["amount"];
            $pby = $row["pby"];
            $remarks = $row["remarks"];
        }
    }
}


$i_name = array();

$i_sql = "SELECT part FROM voucher_group where company = '".$company."'";
$i_result = $conn->query($i_sql);
while($row = $i_result->fetch_assoc()) {
    array_push($i_name,$row["part"]);
}



// print_r($i_name);die();


    

if(isset($_POST['submit']))
{
    // echo '<pre>';
    // print_r($_FILES);
    // print_r($_POST);
    
    $status = false;
    
    // $i_sql_edit = "SELECT * FROM item where company = '".$company."' and category = '".$_POST['category']."' and iname = '".$_POST['iname']."' ";
    // $i_result_edit = $conn->query($i_sql_edit);
    // while($row = $i_result_edit->fetch_assoc()) {
    //     $status = true;
    // }
    
    // if($status)
    // {
    //     echo "<script>window.alert('Already Exists!')</script>";
    // } else {
        
    
    
        $last = 0;
        
        $photo = $target_dir . $newfilename;
    
        $last_sql = "SELECT sno FROM voucher GROUP BY sno";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $last = $row["sno"] + 1;
        }
        
    
    
        // echo "<pre>";
        // print_r($_POST);die();
        
        $credit = 0;
        $debit = 0;
        
        if($_POST['entry'] == 'Credit')
        {
            $credit = $_POST['amt'];
        } else {
            $debit = $_POST['amt'];
        }
        
        $sql11 = "INSERT INTO voucher_daybook (billno , dat , part , debit, credit, page  , company) 
        VALUES ('".$last."', '".date("Y-m-d")."', '".$_POST['iname']."', '".$debit."', '".$credit."', 'voucher', '".$company."')";
        
        $conn->query($sql11);
        
        $sql = "INSERT INTO voucher (sno , billno , dat , part , amount, pby, entry, remarks, user, last, company) 
        VALUES ('".$last."', '".$last."', '".$_POST['price']."', '".$_POST['iname']."', '".$_POST['amt']."', '".$_POST['pby']."', '".$_POST['entry']."', '".$_POST['remark']."', '".$user."', '".date("d-m-Y h:i:s A")."', '".$company."')";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Saved Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    // }
    
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
                                    <h6 class="m-0 font-weight-bold text-primary">Voucher <?php if(!$part)
                                                    { echo 'Entry';}
                                                    else{ echo 'Update'; }?>
                                                    </h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Date</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="date" class="input-box" name="price" id="ename" value="<?php echo $dat; ?>" >
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Account Group</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                      <select type="date" class="input-box"  
                                                        placeholder="Type here" name="iname">
                                                          <?php
                                                          
                                                          if($part)
                                                          {
                                                              echo '<option value="'.$part.'">'.$part.'</option>';
                                                          }
                                                          
                                                          foreach($i_name as $compnay)
                                                          {
                                                              echo '<option value="'.$compnay.'">'.$compnay.'</option>';
                                                          }
                                                          ?>
                                                     </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Amount</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="input-box" name="amt" id="ename" value="<?php echo $amount; ?>">
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Entry</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <select type="date" class="form-control form-control-user"  
                                                        placeholder="Type here" name="entry">
                                                        <option value="Credit">Credit</option>
                                                        <option value="Debit">Debit</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Pay Mode</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <select type="date" class="form-control form-control-user"  
                                                        placeholder="Type here" name="pby">
                                                         <?php
                                                          
                                                          if($pby)
                                                          {
                                                              echo '<option value="'.$pby.'">'.$pby.'</option>';
                                                          }
                                                          ?>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Card">Card</option>
                                                        <option value="Other">Other</option>
                                                       
                                                    </select>
                                                </div>
                                                <div class="col-xl-2 col-lg-2">
                                                    <label for="usr" class="input-lead">Remarks</label>
                                                </div>
                                                 <div class="col-xl-4 col-lg-4">
                                                    <textarea list="iname" class="input-box" name="remark" id="ename" ><?php echo $remarks; ?></textarea>
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
                                                    if(!$part)
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