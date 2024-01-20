<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

$company = '';
$ename = '';

$from= "";
$to = "";

$leads = array();

if(isset($_POST['save']))
{
    if($_SESSION["Company"])
        $company = $_SESSION["Company"];
        
    
    $from= $_POST['from'];
    $to = $_POST['to'];
    
    $i_sqlddd = "SELECT distinct billno,DATE_FORMAT(dat,'%d/%m/%Y') as dat,user,total,pby,remarks FROM sales WHERE dat BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' AND company='".$company."'  ORDER BY dat,billno";
    $i_resultdd = $conn->query($i_sqlddd);
    while($row = $i_resultdd->fetch_assoc()) {
        array_push($leads,$row);
    }
    
    //  print_r($leads);
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
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
<form action="" method="POST" style="width:100%">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Sales Report</h6>
                                </div>
                                <!-- Card Header - Dropdown -->
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row" style="padding: 10px 0px">
                                        <div class="col-xl-1 col-lg-1">
                                            From :
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <input type="date" name="from" class="form-control form-control-user" style="cursor: pointer" value="<?php echo $from; ?>">
                                        </div>
                                        <div class="col-xl-1 col-lg-1">
                                            To :
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <input type="date" name="to" class="form-control form-control-user" style="cursor: pointer" value="<?php echo $to; ?>">
                                        </div>
                                         <div class="col-xl-4 col-lg-4">
                                            <input type="submit" value="Generate Report" name="save" class="btn btn-primary form-control form-control-user" style="cursor: pointer" >
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Bill No</th>
                <th>Date</th>
                <th>User</th>
                <th>Bill Amount </th>
                <th>Pay Mode</th>
                <th>Remarks </th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach($leads as $lead)
              {
                  ?>
                    <tr>
                        <td><?php echo $lead['billno']; ?></td>
                        <td><?php echo $lead['dat']; ?></td>
                        <td><?php echo $lead['user']; ?></td>
                        <td><?php echo $lead['total']; ?></td>
                        <td><?php echo $lead['pby']; ?></td>
                        <td><?php echo $lead['remarks ']; ?></td>
                    </tr>
                  <?php
              }
             ?>
        </tbody>
    </table>
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script>
       $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

</body>

</html>