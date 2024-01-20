<header id="mu-header" class="" role="banner">
		<div class="container">
			<nav class="navbar navbar-default mu-navbar">
			  	<div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>

				      <!-- Text Logo -->
				      <a class="navbar-brand" href="index.php"><i class="fa fa-book" aria-hidden="true"></i> e-Learning</a>

				      <!-- Image Logo -->
				      <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav mu-menu navbar-right">
					        <li><a href="index.php#mu-hero">HOME</a></li>
					        <li><a href="books.php?type=ebook">BOOKS</a></li>
					        <li><a href="books.php?type=video">VIDEO's</a></li>
				            <li><a href="index.php#mu-testimonials">TESTIMONIALS</a></li>
				            <li><a href="index.php#mu-contact">CONTACT</a></li>
				            <?php
				            if(!$user)
				            {
				                echo '<li data-toggle="modal" data-target="#user-login"><a href="#user-login">LOGIN </a></li>';
				            } else {
				                echo '<li data-toggle="modal" data-target="#user-profile" style="border: 1px solid white; border-radius: 5px;"> <a href="#user-profile">Welcome :'.$user.'</a></li>';
				            }
				            ?>
				            <li><a href="admin/">ADMIN</a></li>
				      	</ul>
				    </div><!-- /.navbar-collapse -->
			  	</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	<!-- The Modal -->
<div class="modal" id="user-login">
  <div class="modal-dialog">
      <form action="" method="POST">
    <div class="modal-content" style="margin-top: 100px">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
          <div class="input-group" style="padding: 10px 0px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="input-group" style="padding: 10px 0px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
          </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="sign-in">Sign In</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
    </form>
  </div>
</div>
<!-- The profile -->
<div class="modal" id="user-profile">
  <div class="modal-dialog">
      <form action="" method="POST">
    <div class="modal-content" style="margin-top: 100px">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-4" style="text-align: center">
                <img src="admin/<?php echo $userData['photo']; ?>" style="height: 100px;width:100px;border: 1px solid orange;border-radius: 10px">
            </div>
            <div class="col-lg-8">
            <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 5px">
                <div class="col-lg-5">
                    <b>Firstname</b>
                </div>
                <div class="col=lg-7">
                    : <?php echo $userData['firstname']; ?>
                </div>
            </div>
            <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 5px">
                <div class="col-lg-5">
                    <b>Midlename</b>
                </div>
                <div class="col=lg-7">
                    : <?php echo $userData['midle']; ?>
                </div>
            </div>
            <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 5px">
                <div class="col-lg-5">
                    <b>Lastname</b>
                </div>
                <div class="col=lg-7">
                    : <?php echo $userData['lastname']; ?>
                </div>
            </div>
            <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 5px">
                <div class="col-lg-5">
                    <b>Class</b>
                </div>
                <div class="col=lg-7">
                    : <?php echo $userData['class']; ?>
                </div>
            </div>
            </div>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="logout">Logout</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
    </form>
  </div>
</div>