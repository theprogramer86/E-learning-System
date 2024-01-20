<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['update']))
{
     $sql = "UPDATE lead_entry SET fdate='".$_POST['nfd']."' , status='".$_POST['status']."' , ratio='".$_POST['ratio']."' , remarks='".$_POST['remarks']."' WHERE sno=".$_POST['sno']."";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.alert('Record updated successfullyy')</script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
//  print_r($_POST);die();
}

$leads = array();

if($_SESSION["UserType"] == "User")
{
    $i_sql = "SELECT * FROM lead_entry WHERE fdate < '".date('Y-m-d')."' and user='".$_SESSION["Username"]."' ORDER BY fdate";
    $i_result = $conn->query($i_sql);
    while($row = $i_result->fetch_assoc()) {
        array_push($leads,$row);
    }
} else {
    $i_sql = "SELECT * FROM lead_entry WHERE fdate < '".date('Y-m-d')."'  ORDER BY fdate";
    $i_result = $conn->query($i_sql);
    while($row = $i_result->fetch_assoc()) {
        array_push($leads,$row);
    }
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
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
        td{
            font-size: 13px;
        }
        th{
            font-size: 13px;
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
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Unfollows List</h6>
                                    
                                </div>
                                <div class="card-body" >
                                    <div style="width:98%;overflow-x: scroll;padding: 20px 0px">
                        <table id="example" class="table table-striped table-bordered" style="width:2000px">
        <thead>
            <tr>
                <th>Lead Number</th>
                <th>Date & Time</th>
                <th>Status</th>
                <th>Conversion Ratio</th>
                <th>Next Fallow Date</th>
                <th>Category</th>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Mobile</th>
                <th>Software</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach($leads as $lead)
              {
                  ?>
                  <tr>
                    <td><?php echo $lead['sno']; ?></td>
                    <td><?php echo $lead['dat']; ?> <?php echo $lead['tim']; ?></td>
                    <td data-toggle="modal" data-target="#myModal<?php echo $lead['sno']; ?>"><?php echo $lead['status']; ?></td>
                    <td data-toggle="modal" data-target="#myModal<?php echo $lead['sno']; ?>"><?php echo $lead['ratio']; ?></td>
                    <td data-toggle="modal" data-target="#myModal<?php echo $lead['sno']; ?>"><?php echo $lead['fdate']; ?></td>
                    <td><?php echo $lead['cat']; ?></td>
                    <td><?php echo $lead['company']; ?></td>
                    <td><?php echo $lead['cname']; ?></td>
                    <td><?php echo $lead['mobile']; ?></td>
                    <td><?php echo $lead['iname']; ?></td>
                    <td>
                        <?php echo $lead['user']; ?>
                    <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $lead['sno']; ?>"><i class="fa fa-edit"></i></button>-->
                        <div id="myModal<?php echo $lead['sno']; ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                            <form action="" method="POST">
                              <div class="modal-header">
                                <h4 class="modal-title"><?php echo $lead['cname']; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4">
                                        <label for="usr" class="input-lead">Next Follow Date</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="date" name="nfd" class="input-box" id="usr" value="<?php echo $lead['fdate']; ?>">
                                        <input type="hidden" name="sno" class="input-box" id="usr" value="<?php echo $lead['sno']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Status</label>
                                                </div>
                                                <div class="col-xl-8 col-lg-8" style="padding: 10px 10px">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <select class="form-control" name="status" id="sel1" value="<?php echo $lead['status']; ?>">
                                                        <option value="Following">Following</option>
                                                        <option value="Completed /Installed">Completed/ Installed</option>
                                                        <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                            </div>
                                <div class="row">
                                                <div class="col-xl-4 col-lg-4">
                                                    <label for="usr" class="input-lead">Conversion Ratio</label>
                                                </div>
                                               <div class="col-xl-8 col-lg-8" style="padding: 10px 10px">
                                                    <!--<input type="text" class="input-box" id="usr">-->
                                                    <select class="form-control" id="sel1" name="ratio" value="<?php echo $lead['ratio']; ?>">
                                                        <option value="<?php echo $lead['ratio']; ?>"><?php echo $lead['ratio']; ?></option>
                                                        <option value="100% - Confimed">100% - Confimed</option>
                                                        <option value="75%  - Almost Confimed">75%  - Almost Confimed</option>
                                                        <option value="50%  - Maybe Confimed">50%  - Maybe Confimed</option>
                                                        <option value="25%  - Just Following">25%  - Just Following</option>
                                                        <option value="0%   - Others">0%   - Others</option>
                                                      </select>
                                                </div>
                                            </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4">
                                        <label for="usr" class="input-lead">Remark</label>
                                    </div>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" name="remark" class="input-box" id="usr" value="<?php echo $lead['remark']; ?>">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                              </div>
                              </form>
                            </div>
                        
                          </div>
                        </div>    
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
        "order": [[ 4, "asc" ]],
        "pageLength": 5
    });
        } );
    </script>

</body>

</html>