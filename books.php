<?php
/**
 * Books Information
 */
session_start();
include("admin/config/database.php");

// Init variables
$user = '';
$userData = array();
$type= '';
$lagn = '';
$cat = '';

// Check User Session
if(empty($_SESSION["user"]))
{
    $user = '';
} else {
    $user = $_SESSION["user"];
    $userData = $conn->query("SELECT `firstname`, `midle`, `lastname`, `class`, `photo`, `username`, `company` FROM student where username = '".$user."' ")->fetch_assoc();
}

// Set Type
if(isset($_GET['type']))
{
    $type = $_GET['type'];
} else {
     $type = 'all';
}

// Set language
if(isset($_GET['lagn']))
{
    $lagn = $_GET['lagn'];
} else {
     $lagn = 'all';
}

$class =  $_SESSION["class"];

// Set Categories
if(isset($_GET['cat']))
{
    $cat = $_GET['cat'];
} else {
     $cat = 'all';
}


// Sign In Process
if(isset($_POST['sign-in']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // print_r($_POST);
    $sql = "SELECT * FROM student WHERE `username`='".$_POST['username']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        if($data['password'] == $_POST['password'])
        {
            $_SESSION["user"] = $data['username'];
			$_SESSION["class"] = $data['class'];
            $user = $data['username'];
            echo "<script>window.alert('Login Successfull..!!!');window.location.href = 'index.php';</script>";
        } else {
            $_SESSION["user"] = '';
            $user = '';
            echo "<script>window.alert('Password Incorrect');window.location.href = 'index.php';</script>";
        }
        
    } else {
        $_SESSION["user"] = '';
        $user = '';
        echo "<script>window.alert('Username & Password Incorrect');window.location.href = 'index.php';</script>";
    }
}

// User Logout
if(isset($_POST['logout']))
{
    // remove all session variables
    session_unset();
    
    
    // destroy the session
    session_destroy();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>e-Learning</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
 <style>
     .text-btn-lines {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #c6c6c6;
        line-height: 0.1em;
        margin: 15px 0 15px;
    }
    .text-btn-lines span {
        background: #fafafa;
        padding: 0 10px;
        /* font-family: 'Roboto Slab', serif; */
    }
 </style>
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

   	
  	<!-- Start Header -->
	<?php include('common/menu.php'); ?>
	<!-- End Header -->

	<!-- Start Featured Slider -->

	<section id="mu-hero" style="height: 100px; min-height: 100px;padding: 0px">
		<br>
	</section>
	
	<!-- Start Featured Slider -->
	
	<!-- Start main content -->
		
	<main role="main">
        
		<!-- Start Book Overview -->
		<section id="mu-book-overview">
		    <br><br>
			<div class="container">
				<div class="row">
				    <div class="col-md-4">
				        <div style="width: 100%">
				            <h6 class="text-btn-lines text-capitalize mb-4 acc_authors"><span>filters</span></h6>
				        </div>
				        <!-- Start Header -->
                    	<?php 
							include('common/sidemenu.php'); 
						?>
                    	<!-- End Header -->
				    </div>
					<div class="col-md-8">
					    <?php
					    
					    if(isset($_GET['type']) && $_GET['type'] != 'all')
					    {
					       $where = "";
					       if(isset($_GET['type']) && $_GET['type'] != 'all')
					       {
					           $where .= "type LIKE '%".$_GET['type']."%' ";
					       }
					       if(isset($_GET['lagn']) && $_GET['lagn'] != 'all')
					       {
					           if($_GET['type'] == 'all')
					           {
					               $where .= " language LIKE '%".$_GET['lagn']."%' ";
					           } else {
					               $where .= " and language LIKE '%".$_GET['lagn']."%' ";
					           }
					           
					       }
					       if(isset($_GET['cat']) && $_GET['cat'] != 'all')
					       {
					           $where .= " and category LIKE '%".$_GET['cat']."%'";
					       }
					       $books = "SELECT `sno`,`type`, `category`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE ".$where." ";
					       
					       //print_r($books);
					    } else{
					        $books = "SELECT `sno`,`type`, `category`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE category='".$class."' ";
					    }
    								    
    						    
                                $books_result = $conn->query($books);
                            ?>
					    
						<div class="mu-book-overview-area" style="padding-top: 0px">

							<div style="width: 100%">
        				            <h6 class="text-btn-lines text-capitalize mb-4 acc_authors"><span>Showing <?php echo $books_result->num_rows; ?> Results</span></h6>
        				    </div>

							<!-- Start Book Overview Content -->
							<div class="mu-book-overview-content">
    								<div class="row">
    								    
    								    <?php
                                        while($row = $books_result->fetch_assoc()) {
                                            ?>
                                            <!-- Book Overview Single Content -->
        									<div class="col-md-3 col-sm-6" style="height: 300px">
        									    <?php
        									    if($user)
        									    {
        									        ?> 
        									        <a href="view.php?type=<?php echo $row['type'];?>&&view=<?php echo $row['sno'];?>">
        									        <?php
        									    }  else {
        									        ?>
        									        <a data-toggle="modal" data-target="#user-login" style="cursor: pointer">
        									        <?php
        									    } 
        									    ?>
        										<div class="mu-book-overview-single" style="padding-bottom: 0px;">
        											<span class="mu-book-overview-icon-box">
        												<img src="admin/<?php echo $row['thumb']; ?>" width="70px" height="100px">
        											</span>
        											<div style="height: 60px">
        											    <h4 style="font-size: 15px"><?php echo $row['iname']; ?></h4>
        											</div>
        											<div style="border-top: 1px solid silver;background-color: white;padding: 10px;text-align: left">
            										    <?php 
            										    
            										    if($row['type'] == 'video')
            										    {
            										        echo '<i class="fa fa-video-camera"></i> ';
            										    } else {
            										        echo '<i class="	fa fa-book"></i> ';
            										    }
            										    echo $row['type']; 
            										    
            										    ?>
            									    </div>
        										</div>
        										</a>
        										
        									</div>
        									<!-- / Book Overview Single Content -->
                                            <?php
                                        }
    
    								    ?>
    
    									
    								</div>
    								
							</div>
							<!-- End Book Overview Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Book Overview -->

		</main>

	<!-- Start footer -->
	<?php include('common/footer.php'); ?>
	
	<!-- End footer -->

	
	
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="assets/js/counter.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets/js/app.js"></script>
   
 
	
    <!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	
    
  </body>
</html>