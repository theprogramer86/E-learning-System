<?php

$userData = array();

if(empty($_SESSION["user"]))
{
    $user = '';
} else {
    $user = $_SESSION["user"];
    $userData = $conn->query("SELECT `firstname`, `midle`, `lastname`, `class`, `photo`, `age`, `username`, `company` FROM student where username = '".$user."' ")->fetch_assoc();
}

$categoryList = array();

$i_sql_cat = "SELECT category FROM item_category";
$i_result_cat = $conn->query($i_sql_cat);
while($row = $i_result_cat->fetch_assoc()) {
    array_push($categoryList,$row["category"]);
}


if(isset($_POST['sign-up']))
{
    // echo '<pre>';
    // print_r($_FILES);
    // // print_r($_POST);
    // die();
    
    $status = false;
    
    $i_sql_edit = "SELECT * FROM student where class = '".$_POST['category']."' and username = '".$_POST['username']."' ";
    $i_result_edit = $conn->query($i_sql_edit);
    while($row = $i_result_edit->fetch_assoc()) {
        $status = true;
    }
    
    if($status)
    {
        echo "<script>window.alert('Already Exists!')</script>";
    } else {
        
    
    $target_dir = "admin/uploads/";

    $target_file = $target_dir . basename($_FILES["choose-file"]["name"]);
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
    if ($_FILES["choose-file"]["size"] > 500000) {
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
        
        $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["choose-file"]["name"]));

      if (move_uploaded_file($_FILES["choose-file"]["tmp_name"], $target_dir . $newfilename)) {
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
        $sql = "INSERT INTO `student`(`firstname`, `midle`, `lastname`, `class`, `photo`,`age`, `username`, `password`, `company`) VALUES ('".$_POST['firstname']."', '-', '".$_POST['lastname']."', '".$_POST['category']."', '".$photo."', '".$_POST['age']."','".$_POST['username']."', '".$_POST['password']."','-')";
        
        if ($conn->query($sql) === TRUE) {
             $_SESSION["user"] = $_POST['username'];
          echo "<script>window.alert('Registered Successfully')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
    }
    
    $last = $last + 1;
}

?><style>
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
}
#img-preview img {  
  width: 100%;
  height: 100%; 
  display: block; 
  border-radius: 70px;
}
[type="file"] {
  height: 0;  
  width: 0;
  overflow: hidden;
}
[type="file"] + label {
  font-family: sans-serif;
  background: #f44336;
  padding: 10px 30px;
  border: 2px solid #f44336;
  border-radius: 3px;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s;
}
[type="file"] + label:hover {
  background-color: #fff;
  color: #f44336;
}
</style>
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
				      	</ul>
				    </div><!-- /.navbar-collapse -->
			  	</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	
	<!-- The Modal -->
<div class="modal" id="user-login" >
  <div class="modal-dialog" style="width: 350px; border-radius: 10px;">
      <form action="" method="POST">
    <div class="modal-content" style="margin-top: 100px;background-color: rgba(0,0,0,0.9); ">
      <!-- Modal Header -->
      <div class="modal-header" style="text-align: center; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white;opacity: 1">&times;</button>
        <h4 class="modal-title">Login</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
          <div class="input-group" style="padding: 10px 0px; color: white;width: 100%">
              <p>Email</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
            <input id="username" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="username" >
          </div>
          <div class="input-group" style="padding: 10px 0px;color: white;width: 100%">
              <p>Password</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->
            <input id="password" type="password" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="password">
          </div>
          <br>
          <div class="row">
              <div class="col-lg-6">
                  <button type="submit" class="btn btn-success" style="width:100%" name="sign-in">Sign In</button>
              </div>
              <div class="col-lg-6">
                  <button type="button" class="btn btn-danger" style="width:100%" data-dismiss="modal">Close</button>
              </div>
          </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <div style="width: 100%;text-align: center;color: white;">
                New to e-Learning ? <a style="color: white;cursor: pointer;text-decoration:underline " data-toggle="modal" data-dismiss="modal" data-target="#user-create">Sign Up</a>
            
      </div>

    </div>
    </form>
  </div>
</div>
<!-- The profile -->
</div>

<!-- The create -->
<div class="modal" id="user-create" >
  <div class="modal-dialog" style="width:80%;border-radius: 10px;">
      <form action="" method="POST" enctype="multipart/form-data">
    <div class="modal-content" style="margin-top: 100px;background-color: rgba(0,0,0,0.9); ">
      <!-- Modal Header -->
      <div class="modal-header" style="text-align: center; color: white">
        <button type="button" class="close" data-dismiss="modal" style="color: white;opacity: 1">&times;</button>
        <h4 class="modal-title">Create Account</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-lg-4 text-center">
                <div id="img-preview"><img ></div>
                <input type="file" accept="image/*" id="choose-file" name="choose-file" />
                <label for="choose-file">Choose File</label>
              </div>
              <div class="col-lg-8">
                  
             
          <div class="row">
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px; color: white;width: 100%">
                  <p>Firstname</p>
                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                <input id="username" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="firstname" required>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px; color: white;width: 100%">
                  <p>Lastname</p>
                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                <input id="username" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="lastname" required>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px; color: white;width: 100%">
                  <p>Age</p>
                <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                <input id="username" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="age" required>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px; color: white;width: 100%">
                  <p>Class</p>
                  <select name="category" class="form-control" value="<?php echo $category; ?>">
                    <?php
                     if($category)
                      {
                          echo '<option value="'.$category.'">'.$category.'</option>';
                      }
                      
                      foreach($categoryList as $compnay)
                      {
                          echo '<option value="'.$compnay.'">'.$compnay.'</option>';
                      }
                      ?>
                </select>
                  
              </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px; color: white;width: 100%">
              <p>Email</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
            <input id="username" type="email" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="username" required>
          </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group" style="padding: 10px 0px;color: white;width: 100%">
              <p>Password</p>
            <!--<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>-->
            <input id="password" type="password" class="form-control" style="background-color: rgba(0,0,0,0.5);color: white;padding: 10px;width: 100%" name="password" required>
          </div>
            </div>
             <div class="col-lg-12">
                 <br>
                 <div class="row">
              <div class="col-lg-6">
                  <button type="submit" class="btn btn-success" style="width:100%" name="sign-up">Sign Up</button>
              </div>
              <div class="col-lg-6">
                  <button type="button" class="btn btn-danger" style="width:100%" data-dismiss="modal">Close</button>
              </div>
          </div>
                 </div>
            
        </div>
         </div>
        </div>
          <br>
          
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <div style="width: 100%;text-align: center;color: white;">
                Already have an account? <a style="color: white;cursor: pointer;text-decoration:underline" data-toggle="modal" data-dismiss="modal" data-target="#user-login">Sign In</a>
      </div>

    </div>
    </form>
  </div>
</div>
</div>
<!-- The create -->
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
                    <b>Lastname</b>
                </div>
                <div class="col=lg-7">
                    : <?php echo $userData['lastname']; ?>
                </div>
            </div>
            <div class="row" style="border-bottom: 1px solid rgba(235, 226, 225, 0.2);padding: 5px">
                <div class="col-lg-5">
                    <b>Age</b>
                </div>
                <div class="col=lg-7">
                    : <?php echo $userData['age']; ?>
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