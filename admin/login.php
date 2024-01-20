<?php

session_start();

include('config/database.php');

$errorUser = "";
$errorPassword = "";
$errorCmp = "";

$user = "";
$pass = "";
$id = '';
if(isset($_POST['submit']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // print_r($_POST);
    $sql = "SELECT * FROM users WHERE `user`='".$_POST['username']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        if($data['pass'] == $_POST['password'])
        {
            $_SESSION["UserType"] = $data['utype'];
            $_SESSION["Username"] = $data['user'];
            $_SESSION["Company"] = $data['company'];
            $_SESSION["Status"] = $data['status'];
            $_SESSION["cid"] = $data['cid'];
            header("location: index.php");
        } else {
            $errorUser = "";
            $errorPassword = "Password Incurrect";
        }
        
    } else {
        $errorUser = "Username Incurrect";
        $errorPassword = "Password Incurrect";
        $errorCmp = "Company ID Incurrect";
    }
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
    <?php include('common/header.php'); ?>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .full-body{
            overflow: scroll;
            overflow-x: hidden
        }
        .login-box{
            padding: 2rem 5rem;
            width: 70%;
            margin: 0px auto;
        }
        .left-box{
            height: 100vh;
            padding: 50px 5rem;
            text-align: center; 
            background-color: WHITE
        }
        @media only screen and (max-width: 600px) {
            .full-body{
                overflow: scroll
            }
            .left-box{
                display: none;
            }
            .login-box{
                padding: 2rem 1rem;
                width: 80%;
                height: 100vh;
                margin: 0px auto;
                box-shadow: 0px 0px 10px silver;
            }
        }
            </style>
</head>

<body class="full-body">


                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 left-box">
                                <!--<a href="/"><img src="img/pos logo.png" width="50%"></a>-->
                                <a href="../"><img src="img/learning1.png" style="width: 80%;margin-top: 20%"></a>
                                <!--<img src="img/kool.jpg" style="margin-top: -40px" width="50%">-->
                                <br><br><br><br><br>
                                <!-- <p style="font-size: 20px">&copy <?php echo date("Y"); ?>  -->
                                <!-- <?php print_r($websetting['copyright_details']); ?>. --> Developed by Pranjali Bokey, Suraj Chaudhari, Vaibhav Budhawt, Megha Urkude, Govind Verma <br> 2023 CSE Batch.</p>
                            </div>
                            <div class="col-lg-6" style="background: #F0F0F0">
                                <div class="login-box">
                                    <div style="width: 100%;text-align: center;padding: 20px;margin-top: 20%">
                                        <!--<a href="/"><img src="img/logo.png" width="80%"></a>-->
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b style="color:#6e6b7b">Secure Login</b></h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"> <?php echo $errorUser; ?></p>
                                            <p style="margin-bottom: 2px">Username</p>
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" style="border-radius: 5px"
                                                placeholder="" value="admin">
                                                
                                        </div>
                                        <div class="form-group">
                                            <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                            <p style="margin-bottom: 2px">Password</p>
                                            <input type="password" name="password" class="form-control form-control-user" style="border-radius: 5px"
                                                id="exampleInputPassword" placeholder="" value="admin">
                                        </div>
                                        <div class="text-right" style="margin-bottom: 10px">
                                            <a class="small" href="#" style="font-size: 14px;font-weight: 600;text-decoration: none" onclick="msg()">Forgot Password?</a>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <div class="custom-control custom-checkbox small">-->
                                        <!--        <input type="checkbox" class="custom-control-input" id="customCheck">-->
                                        <!--        <label class="custom-control-label" for="customCheck">Remember-->
                                        <!--            Me</label>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="border-radius: 5px">
                                            Login
                                        </button>
                                        <!--<hr>-->
                                    </form>
                                    <div class="text-center" style="margin-top: 20px">
                                            <a class="small" href="../" style="font-size: 14px;font-weight: 600;text-decoration: none"><u>Back to Home</u></a>
                                    </div>
                                </div>

            </div>

        </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
    <script>
        function  msg(){
            alert("Please Contact Customer Care!")
        }
    </script>

</body>

</html>