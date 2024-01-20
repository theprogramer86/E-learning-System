<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

date_default_timezone_set('Asia/Kolkata');

$company = '';
$user = '';
$pass = '';
$type ='';

$cid = '';

if($_SESSION["Company"])
    $company = $_SESSION["Company"];
if($_SESSION["cid"])
    $cid = $_SESSION["cid"];

$total_unfollows = 0;

$today_follows = 0;
$total_leads = 0;
$tomorow_follow = 0;
$installed = 0;
$unfollows = 0;
$conversion = 0;


// $i_name = array();

// $i_sql = "SELECT category FROM item_category where company = '".$company."'";
// $i_result = $conn->query($i_sql);
// while($row = $i_result->fetch_assoc()) {
//     array_push($i_name,$row["category"]);
// }

// print_r($i_name);die();



if(isset($_POST['update']))
{

    
        // echo "<pre>";
        // print_r($_POST);die();
        $sql = "UPDATE gurukkal_master SET per =  '".$_POST['password']."' WHERE sno= '".$_GET['id']."'";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Updated Successfully')</script>";
        //   header("location: user.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $user = $_POST["username"];
        $pass = $_POST["password"];
        header('Location: gurukkal.php');
    
    $last = $last + 1;
}

    

if(isset($_POST['submit']))
{
    $last = 0;
    
    $last_sql = "SELECT sno FROM gurukkal_master GROUP BY sno";
    $last_result = $conn->query($last_sql);
    while($row = $last_result->fetch_assoc()) {
        $last = $row["sno"] + 1;
    }
    
    $status = false;
    
    $i_sql_edit = "SELECT gname FROM gurukkal_master where gname = '".$_POST['username']."' ";
    $i_result_edit = $conn->query($i_sql_edit);
    while($row = $i_result_edit->fetch_assoc()) {
        $status = true;
    }
    
    if($status)
    {
        echo "<script>window.alert('Already Exists!')</script>";
    } else {
    
        // echo "<pre>";
        // print_r($last);die();
        $sql = "INSERT INTO gurukkal_master (sno , gname, per, company) VALUES ('".$last."', '".$_POST['username']."', '".$_POST['password']."','".$company."')";
        
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.alert('Saved Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $last = $last + 1;
} else{
    if(isset($_GET['type']))
{
    if($_GET['type'] == 'edit')
    {
        $i_sql_edit = "SELECT gname,per FROM gurukkal_master where company = '".$company."' and sno = '".$_GET['id']."' ";
        $i_result_edit = $conn->query($i_sql_edit);
        while($row = $i_result_edit->fetch_assoc()) {
            $user = $row["gname"];
            $pass = $row["per"];
        }
    }
    if($_GET['type'] == 'delete')
    {
        ?>
        <script>
            var proceed = confirm("Are you sure want to Delete ?");
            if (proceed) {
                <?php
                $sql = "DELETE FROM gurukkal_master WHERE sno=  '".$_GET['id']."' ";

                if ($conn->query($sql) === TRUE) {
                //   echo "Record deleted successfully";
                  ?>
                  window.alert('Deleted Successfully');
                  <?php
                //   header("location: category.php");
                } else {
                  echo "Error deleting record: " . $conn->error;
                }
                ?>
            } else {
              //don't proceed
              <?php
                // header("location: category.php");
                ?>
            }
        </script>
        <?php
    }
    
}
}


// print_r($area_name);die();

$leads = array();

$i_sqlddd = "SELECT * FROM gurukkal_master where company = '".$company."'";
    $i_resultdd = $conn->query($i_sqlddd);
    while($row = $i_resultdd->fetch_assoc()) {
        array_push($leads,$row);
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

    <title>Selrom Software</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    
    <!-- Header -->
    <?php include('common/header.php'); ?>
    <!-- End of Header -->
    
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
                        
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <form action="" method="POST" style="width:100%">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Gurukkal Master</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Gurukkal Name</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input class="input-box" name="username" id="ename" value="<?php echo $user; ?>" <?php echo $user?'disabled':''; ?>  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Percentage %</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input class="input-box" name="password" id="ename" value="<?php echo $pass; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <!--<label for="usr" class="input-lead">Password</label>-->
                                                </div>
                                                <div class="col-xl-8 col-lg-8">
                                                    <?php
                                                    if($user || $pass)
                                                    {
                                                        ?>
                                                        <button type="submit" style="width:100%" name="update" class="btn btn-primary"><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;Update</button>
                                                        <?php
                                                    } else{
                                                        ?>
                                                        <button type="submit" style="width:100%" name="submit" class="btn btn-primary"><i class="fa fa-inbox"></i> &nbsp;&nbsp;&nbsp;Save</button>
                                                        
                                                        <?php
                                                    }
                                                    ?>
                                                    <br><br><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </form>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Gurukkal Name</th>
                <th>Percentage %</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach($leads as $lead)
              {
                  ?>
                  <tr>
                    <td><?php echo $lead['gname']; ?></td>
                    <td><?php echo $lead['per']; ?></td>
                    <td>
                        <a href="gurukkal.php?type=edit&&id=<?php echo $lead['sno']; ?>"><i class="fa fa-pencil-square"></i></a> &nbsp;&nbsp;&nbsp;
                        <a href="gurukkal.php?type=delete&&id=<?php echo $lead['sno']; ?>" style="color: red"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                  <?php
              }
             ?>
        </tbody>
    </table>
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