<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

$company = '';
$ename = '';


if(isset($_GET['type']))
{

    if($_GET['type'] == 'delete')
    {
        ?>
        <script>
            var proceed = confirm("Are you sure want to Delete ?");
            if (proceed) {
                <?php
                $sql = "DELETE FROM item WHERE sno=  '".$_GET['id']."' ";

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



if($_SESSION["Company"])
    $company = $_SESSION["Company"];
    
$leads = array();

$i_sqlddd = "SELECT * FROM item where type='ebook' and company = '".$company."'";
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
                                    <h6 class="m-0 font-weight-bold text-primary">eBooks List</h6>
                                    
                                </div>
                                <!-- Card Header - Dropdown -->
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div style="width:100%; overflow-x: scroll; padding: 0px 0px 20px">
                                        <div style="width: 1100px">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Thumbline</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year </th>
                <th>View</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $count = 1;
              foreach($leads as $lead)
              {
                  ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                        <td style="text-align: center"><img src="<?php echo $lead['thumb']; ?>" width="70px" height="100px"></td>
                        <td><?php echo $lead['iname']; ?></td>
                        <td><?php echo $lead['author']; ?></td>
                        <td><?php echo $lead['year']; ?></td>
                    <td>
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $lead['sno']; ?>">
                            Preview
                        </button>
                        <!-- The Modal -->
              <div class="modal" id="myModal<?php echo $lead['sno']; ?>">
                <div class="modal-dialog" style="width: 80%; max-width: 1300px">
                  <div class="modal-content" >
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title"><?php echo $lead['iname']; ?></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <iframe width="100%" height="500px" src="<?php print($lead['photo']); ?>"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>
                            <div class="col-lg-6">
                                
                        <!-- Nav tabs -->
                          <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#home">Details</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#review">Review</a>
                            </li>
                          </ul>
                        
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Title</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['iname']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Author(s):</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['author']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Publisher:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['publisher']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Place of Publication:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['place']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Description</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['price']; ?>
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Total pages:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['totalpages']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Language:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $lead['language']; ?> 
                                    </div>  
                                </div>
                                
                            </div>
                            <div id="menu1" class="container tab-pane fade">
                                <br>
                              <p>This item has not yet been reviewed. Be the first to review this item.</p>
                            </div>
                          </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                  </div>
                </div>
              </div>
                        </td>
                        <td>
                            <a href="assignment-master.php?type=edit&&id=<?php echo $lead['sno']; ?>"><i class="fa fa-pencil-square"></i></a> &nbsp;&nbsp;&nbsp;
                            <a href="assignment-list.php?type=delete&&id=<?php echo $lead['sno']; ?>" style="color: red"><i class="fa fa-trash"></i></a>
                        </td>
                </tr>
                  <?php
                  $count += 1;
              }
             ?>
        </tbody>
    </table>
                   
                    </div>
                </div>                 </div>
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