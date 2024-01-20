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


if(isset($_POST['update']))
{
  $_SESSION["class"] = $_POST['category'];
  $last = 0;
    // echo '<pre>';
    // print_r($_FILES);
    // // print_r($_POST);
    // die();
    
    
        
        
        if($_FILES["photo"]["name"])
        {
    
    $target_dir = "admin/uploads/";

    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    
    
    // Check if file already exists
    if (file_exists($target_file)) {
    //   echo "Sorry, file already exists.";
      echo "<script>window.alert('Sorry, file already exists.')</script>";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
    //   echo "Sorry, your file is too large.";
        echo "<script>window.alert('Sorry, your file is too large.')</script>";
      $uploadOk = 0;
    }
    
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed')</script>";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    //   echo "Sorry, your file was not uploaded.";
    echo "<script>window.alert('Sorry, your file was not uploaded.')</script>";
    // if everything is ok, try to upload file
    } else {
        
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["photo"]["name"]));

      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $newfilename)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        
        $last = 0;
        
        $photo = 'uploads/'. $newfilename;
    
        $last_sql = "SELECT sno FROM item GROUP BY sno";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $last = $row["sno"] + 1;
        }
        
    
    
        // echo "<pre>";
        // print_r($last);die();
        $sql = "UPDATE  `student`set `firstname` = '".$_POST['firstname']."', `lastname` = '".$_POST['lastname']."', `class` = '".$_POST['category']."', `photo` = '".$photo."',`age`= '".$_POST['age']."' WHERE username = '".$_POST['username']."' ";
        
        if ($conn->query($sql) === TRUE) {
             $_SESSION["user"] = $_POST['username'];
          echo "<script>window.alert('Updated Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
        } else {
            $sql = "UPDATE  `student` set `firstname` = '".$_POST['firstname']."', `lastname` = '".$_POST['lastname']."', `class` = '".$_POST['category']."' ,`age`= '".$_POST['age']."' WHERE username = '".$_POST['username']."' ";
        
            if ($conn->query($sql) === TRUE) {
                 $_SESSION["user"] = $_POST['username'];
              echo "<script>window.alert('Updated Successfully')</script>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
    
    
    $last = $last + 1;
}


if(isset($_POST['logout']))
{
    // remove all session variables
    session_unset();
    
    
    // destroy the session
    session_destroy();
    header("location: index.php");
}

if(empty($_SESSION["user"]))
{
    $user = '';
} else {
    $user = $_SESSION["user"];
    $userData = $conn->query("SELECT `firstname`, `midle`, `lastname`, `age`, `class`, `photo`, `username`,`password`, `company` FROM student where username = '".$user."' ")->fetch_assoc();
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
 <style>
    #img-preview {
  display: block; 
  width: 155px;   
  height: 155px;   
  border-radius: 70px;
  border: 2px dashed #333;
  margin: 0px auto;
  margin-bottom: 20px;
  border: 1px solid red;
  background: silver;
  overflow: hidden;
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
        <form action="" method="POST" enctype="multipart/form-data">
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
					    <div class="row">
					        
              <div class="col-lg-12 text-center">
                <div id="img-preview">
                    <?php
                    if($userData['photo'])
                    {
                        ?>
                        <img src="admin/<?php echo $userData['photo']; ?>" ></div>
                    <?php
                    } else {
                        ?>
                        <img src="assets/images/user.png" ></div>
                    <?php
                    }
                    ?>
              </div>
              <div class="col-lg-12">
                  
             
          <div class="row">
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
                  <p>Firstname</p>
                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                <input id="username" type="text" class="form-control" style=" padding: 10px;width: 100%" name="firstname" value="<?php echo $userData['firstname']; ?>" required>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
                  <p>Lastname</p>
                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                <input id="username" type="text" class="form-control" style=" padding: 10px;width: 100%" name="lastname" value="<?php echo $userData['lastname']; ?>" required>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
                  <p>Age</p>
                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                <input id="username" type="text" class="form-control" style=" padding: 10px;width: 100%" name="age" value="<?php echo $userData['age']; ?>" required>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
                  <p>Class</p>
                  <select name="category" class="form-control" value="<?php echo $category; ?>">
                    <?php
                      
                      foreach($categoryList as $compnay)
                      {
                          echo '<option value="'.$compnay.'" ';
                          if($userData['class'] == $compnay)
                          {
                              echo 'selected';
                          }
                          echo '>'.$compnay.'</option>';
                      }
                      ?>
                </select>
                  
              </div>
            </div>
            <div class="col-lg-12">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
              <p>Email</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
            <input id="username" type="email" class="form-control" style=" padding: 10px;width: 100%" name="username" value="<?php echo $userData['username']; ?>" disabled>
            <input id="username" type="hidden" class="form-control" style=" padding: 10px;width: 100%" name="username" value="<?php echo $userData['username']; ?>">
          </div>
            </div>
            <div class="col-lg-12">
                <div class="input-group" style="padding: 10px 0px;  color: black;width: 100%">
              <p>Change Profile Image</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
            <input id="username" type="file" class="form-control" style=" padding: 10px;width: 100%" name="photo" value="<?php echo $userData['username']; ?>" >
          </div>
            </div>
             <div class="col-lg-12">
                 <br>
                 <div class="row">
              <div class="col-lg-12">
                  <button type="submit" class="btn btn-success" style="width:100%" name="update">Update</button>
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
const chooseFile = document.getElementById("photo");
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