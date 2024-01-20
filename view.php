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
if(isset($_GET['type']))
{
    $type = $_GET['type'];
} else {
     $type = 'all';
}

$class =  $_SESSION["class"];

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
					<div class="col-md-12">
					    <?php
					    
					    if(isset($_GET['type']))
					    {
					       $books = "SELECT `sno`,`type`, `category`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE type = '".$_GET['type']."' and sno ='".$_GET['view']."' "; 
					    } else{
					        $books = "SELECT `sno`,`type`, `category`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE sno ='".$_GET['view']."' ";
					    }
    								    
    						    
                                $books_result = $conn->query($books);
                            ?>
					    
						<div class="mu-book-overview-area" style="padding-top: 0px">


							<!-- Start Book Overview Content -->
							<div class="mu-book-overview-content" style="margin-top: 0px">
    								<div class="row">
    								    
    								    <?php
                                        while($row = $books_result->fetch_assoc()) {
                                            ?>
                                            <!-- Book Overview Single Content -->
                  <div class="modal-content" >
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4 class="modal-title"><?php echo $row['iname']; ?></h4>
                            </div>
                            <div class="col-lg-2">
                                <button onclick="goBack()" class="btn btn-warning" style="width:100%;background-color: #FF871C !important">Go Back</button>
                            </div>
                        </div>
                      
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                
                                $link = '';
                                
                                if($row['type'] == 'video')
                                {
                                    $video = (explode("/",$row['photo']));
                                    
                                    $link = 'https://www.youtube.com/embed/'.$video[3];
                                } else {
                                    $link = 'admin/'.$row['photo'];
                                }
                                
                                
                                
                                ?>
                                <iframe width="100%" height="500px" src="<?php print($link); ?>"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>
                            <div class="col-lg-12">
                                
                        <!-- Nav tabs -->
                          <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#home">Details</a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--  <a class="nav-link" href="#review">Review</a>-->
                            <!--</li>-->
                          </ul>
                        
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Title</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $row['iname']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Publisher:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $row['publisher']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Place of Publication:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $row['place']; ?> 
                                    </div>  
                                </div>
                                <div class="row" style="padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Description</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $row['price']; ?>
                                    </div>  
                                </div>
                                <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 10px">
                                    <div class="col-lg-3">
                                        <b>Language:</b>
                                    </div>  
                                    <div class="col-lg-9">
                                        <?php echo $row['language']; ?> 
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
                    
                    
                  </div>
        									<!-- / Book Overview Single Content -->
                                            <?php
                                        }
    
    								    ?>
    
    									
    								</div>
    								
							</div>
							<!-- End Book Overview Content -->
							
							<!-- Start Book Overview Content -->
							<div class="mu-book-overview-content">
    								<div class="row">
    								    
    								    <?php
    								    
    								    $books = "SELECT `sno`, `category`,`type`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE type='".$_GET['type']."' and category='".$class."' Limit 4";
                                        $books_result = $conn->query($books);
                                        if ($books_result->num_rows > 0) {
                                        while($row = $books_result->fetch_assoc()) {
                                            ?>
                                            <!-- Book Overview Single Content -->
        									<div class="col-md-3 col-sm-6">
        									    
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
        										<div class="mu-book-overview-single" style="padding-bottom: 0px;box-shadow: 0px 0px 10px silver">
        											<span class="mu-book-overview-icon-box">
        												<img src="admin/<?php echo $row['thumb']; ?>" width="70px" height="100px">
        											</span>
        											<h4 style="font-size: 15px"><?php echo $row['iname']; ?></h4>
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
                                    } else {
										?>
										<div style="padding: 100px 50px; width: 100%;text-align: center;box-shadow: 0px 0px 10px silver; font-weight: 500;">
										Sorry, Course <?php echo $type; ?> are not availble for this <?php echo $class; ?> class
									</div>
										<?php
									}
    
    								    ?>
    
    									
    								</div>
    								<div style="width: 100%;">
    								    <div style="margin:10px auto;width:100px">
    								        <a href="books.php?type=ebook"><button class="btn btn-warning" >View More</button></a>
    								    </div>
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
	
    <script>
    function goBack() {
      window.history.back();
    }
    </script>
  </body>
</html>