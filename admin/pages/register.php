<?php

session_start();

include('config/database.php');

$errorUser = "";
$password = "";
$errorCmp = "";

$user = "";
$pass = "";
$id = '';
if(isset($_POST['submit']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $gen = false;
    
    $random = rand(100000, 999999);
    
    $last_sql = "SELECT * FROM zcompany GROUP BY sno";
    $last_result = $conn->query($last_sql);
    while($row = $last_result->fetch_assoc()) {
        $last = $row["sno"] + 1;
    }
    
    
    do{
        $last_sql = "SELECT * FROM zcompany where cid ='".$random."'  ";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $gen =  true;
        }
        $random = rand(100000, 999999);
    }while($gen);
    
    $sql = "INSERT INTO zcompany_ids(cid) VALUES ('".$random."')";
    $conn->query($sql);
    
    // print_r($_POST);die();
    // print_r($_POST);
    $sql = "INSERT INTO zcompany (dat, cid, company, cperson, add1, add2, add3, city, state, country, mobile, phone, email, 
    account_approval, plan, amount, monthly,license_status, rdate, edate, ldays, pby, txn_no, remarks, user, last)
    VALUES ('".date("Y-m-d")."',
                '".$random."',
                '".$_POST['company']."',
                '".$_POST['cname']."',
                '".$_POST['add1']."',
                '".$_POST['add2']."',
                '.',
                '".$_POST['city']."',
                '".$_POST['state']."',
                '".$_POST['country']."',
                '".$_POST['mobile']."',
                '".$_POST['phone']."',
                '".$_POST['email']."',
                'no',
                'Basic',
                '0',
                '0',
                'no',
                '".date("Y-m-d")."',
                '".date("Y-m-d")."',
                '0',
                'Cash',
                '.',
                '.',
                '.',
                '.'
                )";
    
    if ($conn->query($sql) === TRUE) {
        header("location: thank_you.php");
        //  echo "<script>window.alert('Successfully Submitted!');window.loaction.href='/'</script>";
        
    } else {
        echo "<script>window.alert('Samething went wrong! Try again');window.loaction.href='/'</script>";
        echo "Error: " . $sql . "<br>" . $conn->error;
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
            padding: 0px 10px 100px;
            width: 90%;
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
                                <a href="/"><img src="img/pos logo.png" width="50%"></a>
                                <img src="img/praying_hands.gif" width="70%">
                                <img src="img/kool.jpg" style="margin-top: -40px" width="50%">
                                <!--<p style="font-size: 20px"><?php print_r($websetting['copyright_details']); ?></p>-->
                            </div>
                            <div class="col-lg-6" style="background: #F0F0F0">
                                <div class="login-box">
                                    <div style="width: 100%;text-align: center;padding: 20px">
                                        <!--<a href="/"><img src="img/logo.png" width="80%"></a>-->
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b style="color:#6e6b7b">Create Account</b></h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"> <?php echo $errorCmp; ?></p>
                                                    <p style="margin-bottom: 2px">Company</p>
                                                    <input type="text" name="company" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp" style="border-radius: 5px;padding: 10px"
                                                        placeholder="" value="<?php echo $id; ?>" required>
                                                        
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"> <?php echo $errorUser; ?></p>
                                                    <p style="margin-bottom: 2px">Contact Person</p>
                                                    <input type="text" name="cname" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp" style="border-radius: 5px;padding: 10px"
                                                        placeholder="" value="<?php echo $user; ?>" required>
                                                        
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">Address</p>
                                                    <input type="text" name="add1" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>">
                                                    <input type="text" name="add2" class="form-control form-control-user" style="border-radius: 5px;padding: 10px; margin-top: 10px;"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">City</p>
                                                    <input type="text" name="city" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">State</p>
                                                    <input type="text" name="state" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">Country</p>
                                                    <input type="text" name="country" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">Mobile</p>
                                                    <input type="text" name="mobile" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">Alternate Cnos</p>
                                                    <input type="text" name="phone" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <p style="font-size: 13px; color: red; margin-left: 10px;margin-bottom: 0px"><?php echo $errorPassword; ?></p>
                                                    <p style="margin-bottom: 2px">Email</p>
                                                    <input type="email" name="email" class="form-control form-control-user" style="border-radius: 5px;padding: 10px"
                                                        id="exampleInputPassword" placeholder="" value="<?php echo $pass; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="border-radius: 5px">
                                                    Sign Up
                                                </button>
                                            </div>
                                        </div>
                                        
                                        
                                        <!--<hr>-->
                                    </form>
                                    
                                    <div class="text-center" style="margin-top: 20px">
                                            Already have an account? ? <a class="small" href="login.php" style="font-size: 14px;font-weight: 600;text-decoration: none"><u>Sign In</u></a>
                                    </div>
                                    <!--<div class="text-center">-->
                                    <!--    <a class="small" href="register.php">Create an Account!</a>-->
                                    <!--</div>-->
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