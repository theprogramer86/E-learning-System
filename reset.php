<?php

session_start();

include("admin/config/database.php");

$user = '';

$userData = array();

if(empty($_SESSION["user"]))
{
    $user = '';
} else {
    $user = $_SESSION["user"];
    $userData = $conn->query("SELECT `firstname`, `midle`, `lastname`, `class`, `photo`, `username`, `company` FROM student where username = '".$user."' ")->fetch_assoc();
}

$type= '';
$lagn = '';
$cat = '';

if(isset($_GET['type']))
{
    $type = $_GET['type'];
} else {
     $type = 'all';
}

if(isset($_GET['lagn']))
{
    $lagn = $_GET['lagn'];
} else {
     $lagn = 'all';
}

if(isset($_GET['cat']))
{
    $cat = $_GET['cat'];
} else {
     $cat = 'all';
}


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
            echo "<script>window.alert('Password Incurrect');window.location.href = 'index.php';</script>";
        }
        
    } else {
        $_SESSION["user"] = '';
        $user = '';
        echo "<script>window.alert('Username & Password Incurrect');window.location.href = 'index.php';</script>";
    }
}

if(isset($_POST['reset']))
{
    if($_POST['password'] == $_POST['passwordc'])
    {
        $sql = "UPDATE student SET password='".$_POST['password']."' WHERE sno='".$_POST['sno']."'";

        if ($conn->query($sql) === TRUE) {
        //   echo "Record updated successfully";
          echo "<script>window.alert('Record updated successfully');window.location.href = 'index.php';</script>";
        } else {
        //   echo "Error updating record: " . $conn->error;
        echo "<script>window.alert('Samething went wrong');window.location.href = 'index.php';</script>";
        }
        
    } else {
         echo "<script>window.alert('Password not match.!!!')</script>";
    }
}

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
	<?php include('common/menu1.php'); ?>
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
					<div class="col-md-12">
					     <form action="" method="POST" enctype="multipart/form-data">
						<div class="mu-book-overview-area" style="padding-top: 0px">

							<div style="width: 100%">
        				            <h6 class="text-btn-lines text-capitalize mb-4 acc_authors">Reset Password</h6>
        				    </div>
        				    <div style='width:500px;margin: 20px auto;font-family: arial;box-shadow: 0px 0px 10px silver;'>
                            
                                <div style='padding: 0px 20px 50px; color: black;font-family: Helvetica Neue,Helvetica,Roboto,Arial,sans-serif; font-size: 14px;  text-align: left;'>
                                    
                                    <div class="input-group" style="padding: 10px 0px; color: black;width: 100%">
                                          <p>New Password</p>
                                        <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                                        <input id="username" type="text" class="form-control" style="padding: 10px;width: 100%" name="password" required>
                                    </div>
                                    <div class="input-group" style="padding: 10px 0px; color: black;width: 100%">
                                          <p>Confirm Password</p>
                                        <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                                        <input id="username" type="text" class="form-control" style="padding: 10px;width: 100%" name="passwordc" required>
                                        <input id="password" type="hidden" class="form-control" name="sno" value="<?php echo $_GET['user']; ?>">
                                    </div>
                                    <div class="input-group" style="padding: 10px 0px; color: black;width: 100%">
                                        <button type="submit" class="btn btn-success" style="width:100%" name="reset">Reset</button>
                                    </div>
                                </div>
                            </div>


						</div>
						</form>
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