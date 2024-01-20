<?php

include('config/database.php');

$last_sql = "SELECT * FROM zcompany GROUP BY sno";
$last_result = $conn->query($last_sql);
while($row = $last_result->fetch_assoc()) {
    $last = $row["sno"] + 1;
}


if(isset($_GET['bname']))
{
    // print_r($_GET);
    // die();
    
    
    $sql = "INSERT INTO zcompany (dat, cid, company, cperson, add1, add2, add3, city, state, country, mobile, phone, email, 
    account_approval, plan, amount, monthly,license_status, rdate, edate, ldays, pby, txn_no, remarks, user, last)
    VALUES ('".$_GET['start_date']."',
                '".$last."',
                '".$_GET['bname']."',
                '".$_GET['oname']."',
                '".$_GET['add1']."',
                '".$_GET['add2']."',
                '".$_GET['add3']."',
                '".$_GET['city']."',
                '".$_GET['state']."',
                '".$_GET['country']."',
                '".$_GET['mobile']."',
                '".$_GET['phone']."',
                '".$_GET['email']."',
                '".$_GET['acount_apporval']."',
                '".$_GET['plan']."',
                '".$_GET['amount']."',
                '".$_GET['monthly']."',
                '".$_GET['license_status']."',
                '".date("Y-m-d")."',
                '".$_GET['edate']."',
                '".$_GET['ldate']."',
                '".$_GET['pby']."',
                '".$_GET['txn_no']."',
                '".$_GET['remarks']."',
                '".$_GET['username']."',
                '".date("d-m-Y h:i:s A")."'
                )";
    
    if ($conn->query($sql) === TRUE) {
        
        $sql11 = "INSERT INTO users (utype, user, pass, company) VALUES('Administrator', '".$_GET['username']."', '".$_GET['password']."', '".$_GET['bname']."')";
    
        $conn->query($sql11);
    
        echo "<script>window.alert('Successfully Submitted!');window.loaction.href='/'</script>";
        
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

    <title>Selrom Software</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  /*margin: 100px auto;*/
  font-family: Raleway;
  padding: 5px 40px;
  /*width: 70%;*/
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  /*padding: 10px;*/
  /*width: 100%;*/
  /*font-size: 17px;*/
  /*font-family: Raleway;*/
  /*border: 1px solid #aaaaaa;*/
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: .35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}
#company{
    color: red;
}
#user{
    color: red;
}
/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<script>
function checkCompany(str) {
  if (str.length==0) {
    document.getElementById("company").innerHTML="";
    document.getElementById("company").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("company").innerHTML=this.responseText;
      document.getElementById("company").style.border="0px";
    }
  }
  xmlhttp.open("GET","checkCompany.php?q="+str,true);
  xmlhttp.send();
}

function checkUser(str) {
  if (str.length==0) {
    document.getElementById("user").innerHTML="";
    document.getElementById("user").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("user").innerHTML=this.responseText;
      document.getElementById("user").style.border="0px";
    }
  }
  xmlhttp.open("GET","checkUsers.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form id="regForm" action="" style="margin-top: 0px !important">
                              <!-- One "tab" for each step in the form: -->
                              <div class="tab">
                                  <h5>Bussiness details :</h5>
                                  <!--Bussiness details:-->
                                <div class="form-group">
                                    Bussiness Name:<br>
                                    <input type="text" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="bname" onkeyup="checkCompany(this.value)">
                                    <div id="company"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Start Date:<br>
                                        <input type="date" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Start Date" oninput="this.className = ''" name="start_date">
                                    </div>
                                    <div class="col-sm-6">
                                        Currency:<br>
                                        <input list="browsers" class="form-control form-control-user" id="browser" type="text"  id="exampleLastName"
                                            placeholder="Type here" oninput="this.className = ''" name="currency">

                                        <datalist id="browsers">
                                          <option value="INR">
                                          <option value="US Dollar">
                                          <option value="MMK">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Email:<br>
                                        <input type="text" class="form-control form-control-user" placeholder="Type here"  id="exampleFirstName"
                                             oninput="this.className = ''" name="email">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        City:<br>
                                        <input type="text" class="form-control form-control-user" placeholder="Type here"  id="exampleFirstName"
                                             oninput="this.className = ''" name="city">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        State:<br>
                                        <input type="text" class="form-control form-control-user" placeholder="Type here"  id="exampleFirstName"
                                             oninput="this.className = ''" name="state">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Country:<br>
                                        <input type="text" class="form-control form-control-user" placeholder="Type here"  id="exampleFirstName"
                                             oninput="this.className = ''" name="country">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Business contact number:<br>
                                        <input type="text" class="form-control form-control-user"  id="exampleFirstName"
                                            placeholder="Type here" oninput="this.className = ''" name="mobile">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Alternate contact number:<br>
                                        <input type="text" class="form-control form-control-user"  
                                            placeholder="Type here" name="phone">
                                    </div>
                                </div>
                                <!--<p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>-->
                              </div>
                              <div class="tab">
                                  <h5>Owner details :</h5>
                                <div class="form-group">
                                    Owner Name:<br>
                                    <input type="text" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="oname">
                                </div>
                                <div class="form-group">
                                    Address:<br>
                                    <input type="text" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="add1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="add2">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="add3">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Account Approval:<br>
                                        <input type="text" class="form-control form-control-user"  id="exampleFirstName"
                                            placeholder="Type here" oninput="this.className = ''" name="acount_apporval">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Plan:<br>
                                        <input type="text" class="form-control form-control-user"  
                                            placeholder="Type here" name="plan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Amount:<br>
                                        <input type="text" class="form-control form-control-user"  id="exampleFirstName"
                                            placeholder="Type here" oninput="this.className = ''" name="amount">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Monthly:<br>
                                        <input type="text" class="form-control form-control-user"  
                                            placeholder="Type here" name="monthly">
                                    </div>
                                </div>
                              </div>
                              <div class="tab">
                                <h5>Other details :</h5>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        License Status:<br>
                                        <input type="text" class="form-control form-control-user"  id="exampleFirstName"
                                            placeholder="Type here" oninput="this.className = ''" name="license_status">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Paymode:<br>
                                        <select type="date" class="form-control form-control-user"  
                                            placeholder="Type here" name="pby">
                                            <option value="Cash">Cash</option>
                                            <option value="Card">Card</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Other">Other</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Edate:<br>
                                        <input type="date" class="form-control form-control-user"  
                                            placeholder="Type here" name="edate">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Ldays:<br>
                                        <input type="text" class="form-control form-control-user"  id="exampleFirstName"
                                            placeholder="Type here" oninput="this.className = ''" name="ldate">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Tax No:<br>
                                        <input type="text" class="form-control form-control-user"  
                                            placeholder="Type here" name="txn_no">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Remark:<br>
                                        <input type="text" class="form-control form-control-user"  id="exampleFirstName"
                                            placeholder="Type here" oninput="this.className = ''" name="remarks">
                                    </div>
                                    
                                </div>
                              </div>
                              <div class="tab">
                                  <h5>Login Info</h5>:
                                    <div class="form-group">
                                        Admin User:<br>
                                        <input type="text" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="username" onkeyup="checkUser(this.value)">
                                        <div id="user"></div>
                                    </div>
                                    <div class="form-group">
                                        Password :<br>
                                        <input type="password" class="form-control form-control-user" placeholder="Type here" oninput="this.className = ''" name="password">
                                    </div>
                              </div>
                              <div style="overflow:auto;">
                                <div style="float:right;">
                                  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                              </div>
                              <!-- Circles which indicates the steps of the form: -->
                              <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                              </div>
                            </form>
                            <!--<form class="user">-->
                            <!--    <div class="form-group">-->
                            <!--        <input type="text" class="form-control form-control-user" id="exampleInputEmail"-->
                            <!--            placeholder="Bussiness Name">-->
                            <!--    </div>-->
                            <!--    <div class="form-group row">-->
                            <!--        <div class="col-sm-6 mb-3 mb-sm-0">-->
                            <!--            <input type="date" class="form-control form-control-user" id="exampleFirstName"-->
                            <!--                placeholder="Start Date">-->
                            <!--        </div>-->
                            <!--        <div class="col-sm-6">-->
                            <!--            <input list="browsers" id="browser" type="text" class="form-control form-control-user" id="exampleLastName"-->
                            <!--                placeholder="Select Currency">-->

                            <!--            <datalist id="browsers">-->
                            <!--              <option value="INR">-->
                            <!--              <option value="US Dollar">-->
                            <!--              <option value="MMK">-->
                            <!--            </datalist>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="form-group row">-->
                            <!--        <div class="col-sm-6 mb-3 mb-sm-0">-->
                            <!--            <input type="text" class="form-control form-control-user"-->
                            <!--                id="exampleInputPassword" placeholder="Website">-->
                            <!--        </div>-->
                            <!--        <div class="col-sm-6">-->
                            <!--            <input type="password" class="form-control form-control-user"-->
                            <!--                id="exampleRepeatPassword" placeholder="Repeat Password">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="form-group">-->
                            <!--        <input type="email" class="form-control form-control-user" id="exampleInputEmail"-->
                            <!--            placeholder="Email Address">-->
                            <!--    </div>-->
                            <!--    <div class="form-group row">-->
                            <!--        <div class="col-sm-6 mb-3 mb-sm-0">-->
                            <!--            <input type="password" class="form-control form-control-user"-->
                            <!--                id="exampleInputPassword" placeholder="Password">-->
                            <!--        </div>-->
                            <!--        <div class="col-sm-6">-->
                            <!--            <input type="password" class="form-control form-control-user"-->
                            <!--                id="exampleRepeatPassword" placeholder="Repeat Password">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <a  class="btn btn-primary btn-user btn-block">-->
                            <!--        Register Account-->
                            <!--    </a>-->
                            <!--</form>-->
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
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
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>

</html>