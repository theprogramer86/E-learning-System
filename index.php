<?php

session_start();

include("admin/config/database.php");

$user = '';





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

	<section id="mu-hero">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-sm-push-6">
					<div class="mu-hero-right">
						<img src="assets/images/learning.png" alt="Ebook img">
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-sm-pull-8">
					<div class="mu-hero-left">
						<h1>Digital Library</h1>
						<p >E-Learing is an education-focused digital library containing books and videos files that can be accessed through an intranet or the internet. The user can either read documents, view videos directly from the E-library server or you can download these materials to your personal computer and view them later.</p>
						<a href="#" class="mu-primary-btn" data-toggle="modal" data-target="#user-login">Get Start!</a>
						<span>*Avaliable in PDF, video.</span>
					</div>
				</div>	

			</div>
		</div>
	</section>
	
	<!-- Start Featured Slider -->
	
	<!-- Start main content -->
		
	<main role="main">

		<!-- Start Counter -->
		<section id="mu-counter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-counter-area">

							<div class="mu-counter-block">
								<div class="row">

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-files-o" aria-hidden="true"></i>
											<div class="counter-value" data-count="650">0</div>
											<h5 class="mu-counter-name">Total Pages</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<div class="counter-value" data-count="422">0</div>
											<h5 class="mu-counter-name">Chapters</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-users" aria-hidden="true"></i>
											<div class="counter-value" data-count="1055">0</div>
											<h5 class="mu-counter-name">Active Readers</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-trophy" aria-hidden="true"></i>
											<div class="counter-value" data-count="03">0</div>
											<h5 class="mu-counter-name">Got Awards</h5>
										</div>
									</div>
									<!-- / Single Counter -->

								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Counter -->

		<!-- Start Book Overview -->
		<section id="mu-book-overview">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-book-overview-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Book Overview</h2>
								<span class="mu-header-dot"></span>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p> -->
							</div>

							<!-- Start Book Overview Content -->
							<div class="mu-book-overview-content">
    								<div class="row">
    								    
    								    <?php
										$class = isset($_SESSION["class"])? $_SESSION["class"]: '';
    								    $books = "SELECT `sno`, `category`,`type`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE type='ebook' and category='".$class."' Limit 4";
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
        										<div class="mu-book-overview-single" style="padding-bottom: 0px;">
        											<span class="mu-book-overview-icon-box">
        												<img src="admin/<?php echo $row['thumb']; ?>" width="70px" height="100px">
        											</span>
        											<div style="height: 50px">
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
										
									} else {
										?>
										<div style="padding: 100px 50px; width: 100%;text-align: center;box-shadow: 0px 0px 10px silver; font-weight: 500;">
										Sorry, Course Books are not availble for this <?php echo $class; ?> class
									</div>
										<?php
									}
    								    ?>
    
    									
    								</div>
    								<div style="width: 100%;">
    								    <div style="margin:10px auto;width:100px">
    								        <a href="books.php?type=ebook">
												<!-- <button class="btn btn-warning" >View More</button> -->
											</a>
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

		

		<!-- Start Video Review -->
		<section id="mu-video-review">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-video-review-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Check Out Our Video's</h2>
								<span class="mu-header-dot"></span>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p> -->
							</div>

							<!-- Start Video Review Content -->
							<div class="mu-book-overview-content">
								<div class="row">
    								    
    								   <?php
    								    
    								    $books = "SELECT `sno`, `category`,`type`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`  FROM item WHERE type='video' and category='".$class."' Limit 4";
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
        									    
        										<div class="mu-book-overview-single" style="padding-bottom: 0px;">
        											<span class="mu-book-overview-icon-box">
        												<img src="admin/<?php echo $row['thumb']; ?>" width="70px" height="100px">
        											</span>
        											<div style="height: 50px">
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
									} else {
										?>
										<div style="padding: 100px 50px; width: 100%;text-align: center;box-shadow: 0px 0px 10px silver; font-weight: 500;">
										Sorry, Course Videos are not availble for this <?php echo $class; ?> class
									</div>
										<?php
									}
    
    								    ?>
    
    									
    								</div>
    								<div style="width: 100%;">
    								    <div style="margin:10px auto;width:150px">
    								        <a href="books.php?type=video">
												<!-- <button>View More</button> -->
											</a>
    								    </div>
    								</div>
    								
							</div>
							<!-- End Video Review Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Video Review -->

		<!-- Start Author -->
		<section id="mu-author">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-author-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Reference Sites</h2>
								<span class="mu-header-dot"></span>
							</div>

							<!-- Start Author Content -->
							<div class="mu-author-content">
								<div class="row">
									<div class="col-md-4 text-center">
									    <a href="https://www.openstreetmap.org/#map=4/21.84/82.79" target="_blank">
    										<div class="mu-author-image">
    											<img src="assets/images/ref-1.png" alt="Author Image" width="150px">
    										</div>
										</a>
									</div>
									<div class="col-md-4 text-center">
									    <a href="https://www.wikipedia.org/" target="_blank">
    										<div class="mu-author-image">
    											<img src="assets/images/ref-2.gif" alt="Author Image" width="150px">
    										</div>
										</a>
									</div>
									<div class="col-md-4 text-center">
									    <a href="https://www.wiktionary.org/" target="_blank">
    										<div class="mu-author-image">
    										    <br>
    											<img src="assets/images/ref-3.png" alt="Author Image" width="150px">
    										</div>
										</a>
									</div>
								</div>
							</div>
							<!-- End Author Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Author -->


		<!-- Start Testimonials -->
		<section id="mu-testimonials">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-testimonials-area">
							<div class="mu-heading-area">
								<h2 class="mu-heading-title">What Our Readers Says</h2>
								<span class="mu-header-dot"></span>
							</div>

							<div class="mu-testimonials-block">
								<ul class="mu-testimonial-slide">

									<li>
										<p>"This website is very useful for us, it provide many books and videos related our academics. So, I am very thankful this website"</p>
										<img class="mu-rt-img" src="assets/images/user.png" alt="img">
										<h5 class="mu-rt-name"> - Alice Boga</h5>
										<!--<span class="mu-rt-title">CEO, Apple Inc.</span>-->
									</li>

									<li>
										<p>"It is very adaptive learning that we can use anywhere and anytime."</p>
										<img class="mu-rt-img" src="assets/images/user.png" alt="img">
										<h5 class="mu-rt-name"> - Jhon Doe</h5>
										<!--<span class="mu-rt-title">Director, Google Inc.</span>-->
									</li>

									<li>
										<p>"I am thankfull to this website because it provide us lots of knowledge."</p>
										<img class="mu-rt-img" src="assets/images/user.png" alt="img">
										<h5 class="mu-rt-name"> - Jessica Doe</h5>
										<!--<span class="mu-rt-title">Web Developer</span>-->
									</li>

								</ul>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Testimonials -->

	
		<!-- Start Contact -->
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Drop Us A Message</h2>
								<span class="mu-header-dot"></span>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p> -->
							</div>

							<!-- Start Contact Content -->
							<div class="mu-contact-content">

								<div id="form-messages"></div>
								<form method="post" action="mailer.php" class="mu-contact-form">
									<div class="form-group">                
										<input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
									</div>
									<div class="form-group">                
										<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
									</div>              
									<div class="form-group">
										<textarea class="form-control" placeholder="Message" id="message" name="message" required></textarea>
									</div>
									<input type="submit" name="submit" value="Submit" class="mu-send-msg-btn">
									<!-- <button type="submit" class="mu-send-msg-btn"><span>SUBMIT</span></button> -->
						        </form>

							</div>
							<!-- End Contact Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact -->

		<!-- Start Google Map -->
		<section id="mu-google-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d589888.4396405783!2d-82.41588603632052!3d32.866951223053896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f9f727a4ed30eb%3A0xf2139b0c5c7ae1ec!2sDooley+Branch+Rd%2C+Millen%2C+GA+30442%2C+USA!5e0!3m2!1sen!2sbd!4v1497376364225" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>
		<!-- End Google Map -->

	</main>
	
	<!-- End main content -->	
			
			
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