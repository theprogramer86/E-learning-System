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

$dat = date("Y/m/d");

$leads = array();


$open_blc = 0;

if(isset($_POST['save']))
{
    if($_SESSION["Company"])
        $company = $_SESSION["Company"];
        
    
    $from= $_POST['from'];
    $to = $_POST['to'];
    
    $i_sqlddd = "select sno,date_format(dat,'%d/%m/%Y') as dat,billno,part,debit,credit from voucher_daybook where dat BETWEEN '".$_POST['from']."' AND '".$_POST['to']."' and pby='Cash'";
    $i_resultdd = $conn->query($i_sqlddd);
    while($row = $i_resultdd->fetch_assoc()) {
        array_push($leads,$row);
    }
    
    $open = "select sum(credit-debit) as crd from voucher_daybook where dat < '".$dat."' and pby='Cash'";
    $open_result = $conn->query($open);
    while($row = $open_result->fetch_assoc()) {
        $open_blc = $row['crd'];
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

<?php include('common/header.php'); ?>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
 <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
<form action="" method="POST" style="width:100%">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Day book Statement</h6>
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
                                     <?php
                                    if($to)
                                    {
                                    ?>
                                    <div style="width:100%; text-align: right">
                                        Opening Balance on <?php echo date('d/m/Y'); ?>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($open_blc); ?>
                                    </div>
                                    <?php
    }
                                    ?>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Date</th>
                <th style="text-align:right">Ref. No</th>
                <th style="text-align:right">Particulars </th>
                <th style="text-align:right">Debit</th>
                <th style="text-align:right">Credit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_credit = 0;
            $total_dedit = 0;
              foreach($leads as $lead)
              {
                  ?>
                    <tr>
                        <td><?php echo $lead['sno']; ?></td>
                        <td><?php echo $lead['dat']; ?></td>
                        <td style="text-align:right"><?php echo $lead['billno']; ?></td>
                        <td style="text-align:right"><?php echo $lead['part']; ?></td>
                        <td style="text-align:right"><?php echo number_format($lead['debit']); ?></td>
                        <td style="text-align:right"><?php echo number_format($lead['credit']); ?></td>
                    </tr>
                  <?php
                  $total_credit = $total_credit + $lead['credit'];
                  $total_dedit = $total_dedit + $lead['debit'];
              }
             ?>
        </tbody>
    </table>
    <?php
    if($to)
    {
    ?>
                                    <div style="width:100%; text-align: right;margin-top: 50px">
                                        Closing Balance on <?php echo date_format(date_create($to),"d/m/Y"); ?>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($open_blc + $total_credit - $total_dedit); ?>
                                    </div>
                                    <?php
    }
                                    ?>
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