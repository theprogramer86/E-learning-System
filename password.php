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
    $userData = $conn->query("SELECT `firstname`, `midle`, `lastname`, `age`, `class`, `photo`, `username`,`password`, `company` FROM student where username = '".$user."' ")->fetch_assoc();
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


if(isset($_POST['forgot']))
{
    
    $check = "SELECT * FROM student where username = '".$_POST['username']."' ";
    $result_check = $conn->query($check);
    
    // print_r($result_check);die();
    
    if ($result_check->num_rows > 0) {
        
    $stdData = $conn->query("SELECT `sno`, `firstname`, `midle`, `lastname`, `class`, `photo`, `age`, `username`, `company` FROM student where username = '".$_POST['username']."' ")->fetch_assoc();
    
    // print_r($_POST);die();
    // Get the form fields and remove whitespace.
		
		$email = filter_var(trim($_POST["username"]), FILTER_SANITIZE_EMAIL);

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "sharlawar77@gmail.com";
        $from = "clickytl@gmail.com";

        // Set the email subject.
        $subject = "Reset your e-Learning.in password";

        // Build the email content.
        $email_content = "<div style='width:500px;margin: 20px auto;font-family: arial;box-shadow: 0px 0px 10px silver;'>
            <h1 style='width: 100%; padding: 20px 0px;background-color: #3ECF8E; text-align: center;color: white;text-shadow: 0px 0px 5px black;'>Password Reset Request</h1>
            <div style='padding: 0px 20px 50px;    color: #636363;font-family: Helvetica Neue,Helvetica,Roboto,Arial,sans-serif; font-size: 14px; line-height: 150%; text-align: left;'>
                <p>Hi ".$stdData['firstname'].",</p>
        
                <p>Someone has requested a new password for the following account on e-Learning:</p>
        
                <p>Student: ".$stdData['firstname']." ".$stdData['lastname']."</p>
        
                <p>If you didn't make this request, just ignore this email. If you'd like to proceed:</p>
        
                <p><a href='http://www.growsofttechnologies.com/softwares/school-management-software/reset.php?user=".$stdData['sno']."' style='color: #3ECF8E'>Click here to reset your password</a></p>
        
                <p>Thanks for reading.</p>
            </div>
        </div>";
        
        // print_r($email_content);die();

        // Build the email headers.
        // $email_headers = "From: e-Learning <$from>";
        
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
         
        // Additional headers 
        $headers .= "From: e-Learning <$from>";

        // Send the email.
        if (mail($email, $subject, $email_content, $headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            // echo "Thank You! Your message has been sent.";
            echo "<script>window.alert('Thank You! Your Link has been sent.');</script>";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            // echo "Oops! Something went wrong and we couldn't send your message.";
            echo "<script>window.alert('Check email and reset your password');</script>";
        }
    } else {
        echo "<script>window.alert('User not exits.!!!')</script>";
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
	<?php include('common/menu.php'); ?>
	<!-- End Header -->

	<!-- Start Featured Slider -->

	<section id="mu-hero" style="height: 100px; min-height: 100px;padding: 0px">
		<br>
	</section>
	
	<!-- Start Featured Slider -->
	
	<!-- Start main content -->
		
	<main role="main">
        <form action="" method="POST">
		<!-- Start Book Overview -->
		<section id="mu-book-overview">
		    <br><br>
			<div class="container">
				<div class="row">
				    <div class="col-md-4">
				        <!-- Start Header -->
                    	<?php include('common/user-sidemenu.php'); ?>
                    	<!-- End Header -->
				    </div>
					<div class="col-md-8">
					    <div class="row" style="height: 400px">
					  <div class="col-lg-12">
					      <h3>User Password Forgot</h3>
					      </div>
              <div class="col-lg-12">
                  
            <div class="col-lg-12">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
              <p>Enter Your Registered Email</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
            <input id="username" type="email" class="form-control" style=" padding: 10px;width: 100%" name="username" value="<?php echo $userData['username']; ?>" required>
          </div>
            </div>
             <div class="col-lg-12">
                 <br>
                 <div class="row">
              <div class="col-lg-12">
                  <button type="submit" class="btn btn-success" style="width:100%" name="forgot">Reset Link</button>
              </div>
          </div>
                 </div>
            
        </div>
        <br>
        <br>
         </div>
        </div>
					    			
					</div>
				</div>
			</div>
		</section>
		<!-- End Book Overview -->
</form>
		</main>
<br>
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
	
    <script>
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

chooseFile.addEventListener("change", function () {
  getImgData();
});
    function getImgData() {
      const files = chooseFile.files[0];
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
          imgPreview.style.display = "block";
          imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });    
      }
    }
</script>
  </body>
</html>