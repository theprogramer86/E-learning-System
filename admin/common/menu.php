<?php
if(!isset($_SESSION["Username"]))
{
    header("location: login.php");
}

$company = "";
if($_SESSION["Company"])
    $company = $_SESSION["Company"];
?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div style="width: 90%;text-align: left;">
                        <h5 style="font-weight: 600;font-family: arial">
                            <!-- <?php echo $company; ?> -->
                        e-Learning System</h5>
                    </div>
                    <div style="width: 10%;text-align: center;">
                        <!--<a href="temp-pos.php" style="background: white; color: #858796; text-decoration: none; padding:5px 10px; border-radius: 5px"><i class="fa fa-qrcode"></i> POS</a>-->
                    </div>
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["Username"]?$_SESSION["Username"]:''; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Profile-->
                                <!--</a>-->
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Settings-->
                                <!--</a>-->
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Activity Log-->
                                <!--</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                
                
                <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want to Logout ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Confirm</a>
                </div>
            </div>
        </div>
    </div>