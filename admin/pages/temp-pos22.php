<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

$company = '';

if($_SESSION["Company"])
    $company = $_SESSION["Company"];
if($_SESSION["Username"])
    $user = $_SESSION["Username"];
    
$ename = '';
$user = "";
$last_bill = "";
$new_bill = "";

$setting = $conn->query("SELECT * FROM setting where company = '".$company."' ")->fetch_assoc();

$last_sql11 = "SELECT * FROM sales GROUP BY sno";
$last_result11 = $conn->query($last_sql11);
while($row = $last_result11->fetch_assoc()) {
    $last_bill = $row["billno"] + 1;
    $new_bill = $row["billno"] + 1;
}

$category = array();

$cat = "SELECT sno,category FROM item_category where company = '".$company."'";
$cat_result = $conn->query($cat);
while($row = $cat_result->fetch_assoc()) {
    array_push($category,$row);
}

// print_r($category); 
// die();



$items = array();

$i_sqlddd = "SELECT * FROM item where company = '".$company."'";
    $i_resultdd = $conn->query($i_sqlddd);
    while($row = $i_resultdd->fetch_assoc()) {
        array_push($items,$row);
    }

//data

$pby = "";
$remark = "";
$cart_temp = array();


if(isset($_POST['alter']))
{
    $cart =  json_decode($_COOKIE["Cart"], true);
    
    $itemsquantity = $_COOKIE["itemsquantity"];
    
    $total = $_COOKIE["total"];

    $cart_temp = array();
    
    if($itemsquantity != 0)
    {
        
        $last = 1;
        $bill = 1;
        $last_sql = "SELECT * FROM sales GROUP BY sno";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $last = $row["sno"] + 1;
            $bill = $row["billno"] + 1;
        }
        
        $in_status = false;
        
        $sql_sale = "DELETE FROM sales WHERE billno = '".$_POST['billno']."' ";
        $conn->query($sql_sale);
        
        foreach($cart as $data)
        {
            $value = json_decode($data, true);
            
            $sql_stock = "UPDATE stock  SET quan=quan- '".$value['qty']."' WHERE iname='".$value['iname']."' AND company='".$company."' ";
        
            $conn->query($sql_stock);
            
            $sql = "INSERT INTO sales (sno, billno, dat, iname,quan, price, amount, total, pby, remarks, user, last, company) 
            VALUES('".$last."','".$_POST['billno']."','".date("Y-m-d")."','".$value['iname']."','".$value['qty']."','".$value['price']."','".($value['price']*$value['qty'])."','".$total."','".$_POST['pby']."','".$_POST['remark']."','".$user."','".date("d-m-Y h:i:s A")."','".$company."')";
        
            if ($conn->query($sql) === TRUE) {
            
                $in_status= true;
                
            } else {
                echo "<script>window.alert('Samething went wrong! Try again');window.loaction.href='/'</script>";
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // array_push($cart_temp, json_decode($data, true));
            // print_r($data);
            // echo "<br>";
            $last++;
        }
        
        if($in_status)
        {
            echo "<script>deleteData();updateCartTotal();</script>";
            echo "<script>window.alert('Updated Successfully!');</script>";
            
            setcookie('total', '', 86400 * 30, "/");
            setcookie('Cart', '', 86400 * 30, "/");
            setcookie('carttable', '', 86400 * 30, "/");
            setcookie('itemsquantity', '', 86400 * 30, "/");
            
        }
        
        $last_bill = $new_bill;
        
        
        
        // print_r($total);
    } else {
        echo "<script>window.alert('No Products added, add some products first');</script>";
    }
}

if(isset($_POST['delete']))
{
    
    $sql_sales = "DELETE FROM voucher_daybook  WHERE billno=  '".$_POST['billno']."' AND PAGE='sales' ";
    
    $conn->query($sql_sales);
                
    $last_qc = "SELECT * FROM sales where company = '".$company."' and billno = '".$_POST['billno']."'";
    $last_rc = $conn->query($last_qc);
    
    if ($last_rc->num_rows > 0) {
        
        $sql_sale = "DELETE FROM sales WHERE billno = '".$_POST['billno']."' ";
        if ($conn->query($sql_sale) === TRUE) {
            echo "<script>window.alert('Deleted Successfully!');</script>";
            
            $last_bill = $new_bill+1;
            setcookie('total', '', 86400 * 30, "/");
            setcookie('Cart', '', 86400 * 30, "/");
            setcookie('carttable', '', 86400 * 30, "/");
            setcookie('itemsquantity', '', 86400 * 30, "/");
            
        } else {
             echo "<script>window.alert('Samething went wrong!');</script>";
        }
    } else {
        echo "<script>window.alert('No record found!');</script>";
    }
    
}

if(isset($_POST['last']))
{
    $last_bill = $_POST['billno'] - 1;
    
    if($last_bill > 0)
    {
    $last_q = "SELECT * FROM sales where company = '".$company."' and billno = '".$last_bill."'";
    $last_r = $conn->query($last_q);
    
    $itemsquantity = 0;
    
    
    while($row = $last_r->fetch_assoc()) {
        $pby = $row["pby"];
        $remark = $row["remarks"];
        $itemsquantity = $row["quan"];
        
        $myObj->iname = $row["iname"];
        $myObj->price = $row["price"];
        $myObj->qty = $row["quan"];
        
        $myJSON = json_encode($myObj);
        array_push($cart_temp, $myJSON);
    }
    
    } else {
        $last_bill = $new_bill;
        $pby = "";
        $remark = "";
        echo "<script>window.alert('No record found!');</script>";
    }
}
if(isset($_POST['next']))
{
    $last_bill = $_POST['billno'] + 1;
    
    if($last_bill < $new_bill)
    {
    $last_q = "SELECT * FROM sales where company = '".$company."' and billno = '".$last_bill."'";
    $last_r = $conn->query($last_q);
    
    $itemsquantity = 0;
    
    while($row = $last_r->fetch_assoc()) {
       $pby = $row["pby"];
        $remark = $row["remarks"];
        $itemsquantity = $row["quan"];
        
        $myObj->iname = $row["iname"];
        $myObj->price = $row["price"];
        $myObj->qty = $row["quan"];
        
        $myJSON = json_encode($myObj);
        array_push($cart_temp, $myJSON);
    }
    
    } else {
        $last_bill = $new_bill;
        $pby = "";
        $remark = "";
        echo "<script>window.alert('No record found!');</script>";
    }
}
    
    
if(isset($_POST['save']))
{
    $cart =  json_decode($_COOKIE["Cart"], true);
    
    $itemsquantity = $_COOKIE["itemsquantity"];
    
    $total = $_COOKIE["total"];

    $cart_temp = array();
    
    if($itemsquantity != 0)
    {
        
        $last = 1;
        $bill = 1;
        $last_sql = "SELECT * FROM sales GROUP BY sno";
        $last_result = $conn->query($last_sql);
        while($row = $last_result->fetch_assoc()) {
            $last = $row["sno"] + 1;
            $bill = $row["billno"] + 1;
        }
        
        $in_status = false;
        
        $sql11 = "INSERT INTO voucher_daybook (billno , dat , part , debit, credit, page  , company) 
        VALUES ('".$bill."', '".date("Y-m-d")."', 'Sales', '0', '".$total."', 'sales', '".$company."')";
        
        $conn->query($sql11);
        
        foreach($cart as $data)
        {

            $value = json_decode($data, true);
            
            $sql_stock = "UPDATE stock  SET quan=quan- '".$value['qty']."' WHERE iname='".$value['iname']."' AND company='".$company."' ";
        
            $conn->query($sql_stock);
            
        
            
            $sql = "INSERT INTO sales (sno, billno, dat, iname,quan, price, amount, total, pby, remarks, user, last, company) 
            VALUES('".$last."','".$bill."','".date("Y-m-d")."','".$value['iname']."','".$value['qty']."','".$value['price']."','".($value['price']*$value['qty'])."','".$total."','".$_POST['pby']."','".$_POST['remark']."','".$user."','".date("d-m-Y h:i:s A")."','".$company."')";
        
            if ($conn->query($sql) === TRUE) {
            
                $in_status= true;
                
            } else {
                echo "<script>window.alert('Samething went wrong! Try again');window.loaction.href='/'</script>";
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $last++;
        }
        
        if($in_status)
        {
            echo "<script>deleteData();updateCartTotal();</script>";
            echo "<script>window.alert('Saved Successfully');</script>";
            echo "<script type='text/javascript'>window.open('/bill/bill-format-1.php?id=".$last."&copies=1', '_blank')</script>";
            
            header('Location: /bill/index.php?id=' . $bill);
            
            setcookie('total', '', 86400 * 30, "/");
            setcookie('Cart', '', 86400 * 30, "/");
            setcookie('carttable', '', 86400 * 30, "/");
            setcookie('itemsquantity', '', 86400 * 30, "/");
            
        }
        
        $last_bill = $new_bill+1;
        
        
        
        // print_r($total);
    } else {
        echo "<script>window.alert('No Records Were Found to Save!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Sidebar -->
    <?php include('common/header.php'); ?>
    <!-- End of Sidebar -->
    
  <style>
    th{
        color: #525f7f;
        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        
    }
    th, td{
        padding: 10px;
        border: 1px solid #ededed;
        font-size: 13px;
    }
    .cardc {
      margin: 0 auto;
      max-width: 350px;
      text-align: center;
      margin-top: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      font-size: 0;
    }
    .cardc:hover{
      box-shadow: 0 16px 32px 0 rgba(0, 0, 0, 0.2);
    }
    .equal {
  display: flex;
  display: -webkit-flex;
  flex-wrap: wrap;
}
    .calc-head #result {
        width: 335px;
        height: 100px;
        font-size: 32px;
        font-weight: bold;
        text-align: right;
        padding: 0 5px;
        letter-spacing: 2px;
    }
    .calc-head #result:focus {
        border: 1px solid #8f8f9d;
        outline: none;
    }
    .btn11 {
        width: 87px;
        height: 70px;
        font-size: 16px;
        background-color: #1f2326;
        color: white;
    }
    .cal-body div input:last-child{
        background-color: slateblue;
    }
    .btn11:hover{
        background-color:pink;
    }

    @media (max-width:350px){
        .btn11 {
            width: 73px;
        }
        .calc-head #result {
            height: 80px;
        }
    }
    .head-sec{
     padding: 10px 20px;
     box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
     background-color:white;
     margin-bottom:20px;
    }
    .cat-card{
        background-color:white;
        
    }

/* .cat-card a{
        color:white;
        
    } */
    .cat:focus{
         color: red;
    }
    
    #focusmeplease:focus{
        color:red;
        border-color:none;
        outline: none;
    }
    
    </style>
</head>
<body style="background: white;">
   <div class="container-fluid">
      <form action="" method="POST">
        <div class="row">
            <div class="col-lg-12 head-sec" style="background-color: #4e73df;">
                <div class="row">
                  <div class="col-lg-3 col-sm-12" style="text-align:center">
                     <a href="/"><img src="img/logo.png"></a>
                  </div>
                  <div class="col-lg-2 col-sm-12" style="text-align:center;color:white" >
                      <b>Bill No</b><br/> 
                      <span ><?php echo $last_bill; ?></span>
                  </div>
                  <div class="col-lg-2 col-sm-12" style="text-align:center;color:white">
                        <div style="width:100%">
                            <div><b>Date & Time</b></div>
                            <div style="text-align:center">
                               <div> <?php  echo date("d-m-Y"); ?> <span id="MyClockDisplay" onload="showTime()"></span></div>
                           </div>
                        </div>
                   </div>
                   <div class="col-lg-5 col-sm-12 text-right">
                       <a href="/"><i class="fa fa-home" style="color: white; font-size: 40px"></i></a>
                   </div>
               </div>
           </div>
           
           

           <div class="col-sm-6" style="padding-right: 3px">
                <div class="container-fluid" style="background-color: white; border-top-left: 0.25rem;">
                    
                    <div class="row" style="padding:8px;border-top-right: 0.25rem">
                       <!--<div class="card cat-card" style="cursor: pointer;padding: 10px;margin-bottom: 5px;margin-right:10px; background-image: linear-gradient(to right,#4E73DF, #3b92f5);">-->
                       <!--     <div class="card-body" style="text-align: center;padding: 0px">-->
                       <!--         <a style="text-decoration: none;color: white" href="" id="focusmeplease">All</a> -->
                       <!--     </div>                                   -->
                       <!--</div>-->
                        <?php
                        $all = 1;
                        
                        foreach($category as $data)
                        {
                            if($all == 1)
                            {
                            ?>
                            <div class="card cat-card" style="cursor: pointer;padding: 0px;margin-bottom: 5px;margin-right:10px; background-image: linear-gradient(to right,#4E73DF, #3b92f5);"  onclick="tabHighlight('#<?php echo $data['sno'] ?>')">
                                <a style="text-decoration: none"  href="#<?php echo $data['category'] ?>" class="cat">
                                    <div class="card-body" id="<?php echo $data['sno'] ?>"  style="text-align: center;padding: 10px;color: white;">
                                        All
                                    </div>          
                                </a> 
                           </div>
                            <?php
                            }
                            $all++;
                        }
                        
                        foreach($category as $data)
                        {
                            ?>
                            <div class="card cat-card" style="cursor: pointer;padding: 0px;margin-bottom: 5px;margin-right:10px; background-image: linear-gradient(to right,#4E73DF, #3b92f5);"  onclick="tabHighlight('#<?php echo $data['sno'] ?>')">
                                <a style="text-decoration: none"  href="#<?php echo $data['category'] ?>" class="cat">
                                    <div class="card-body" id="<?php echo $data['sno'] ?>"  style="text-align: center;padding: 10px;color: white;">
                                        <?php echo $data['category']; ?>
                                    </div>          
                                </a> 
                           </div>
                            <?php
                        }
                        
                        ?>
                   </div>   
                </div>

             <div style="width: 100%; padding: 10px; height: 60vh;background:white;overflow-x: none;" >
                 <div style="overflow-x: hidden;overflow-y: scroll;height: 70vh;">
                     <?php
                        
                        foreach($category as $data)
                        {
                            ?>
                            <section id="<?php echo $data['category'] ?>">
                            <!--<hr>-->
                            <!--<h6><?php //echo $data['category']; ?></h6>-->
                            <!--<hr>-->
                            <div class="row " style="margin-left:0px; margin-right: 0px">
        	                    <?php
        	                    
        	                    $items = array();

                                $i_sqlddd = "SELECT * FROM item where company = '".$company."' and category='".$data['category']."' ";
                                    $i_resultdd = $conn->query($i_sqlddd);
                                    while($row = $i_resultdd->fetch_assoc()) {
                                        array_push($items,$row);
                                    }
    
                                  foreach($items as $lead)
                                  {
                                  ?>
                                 <div class="col-6 col-lg-3 col-sm-6 col-md-4 d-flex align-items-stretch" style="padding: 2px;">
                                     <div class="card" onclick="addToCart('<?php echo $lead['iname']; ?>','<?php echo $lead['price']; ?>')" style="cursor: pointer;padding: 5px;margin-bottom: 5px;">
                                         <div class="card-body" style="text-align: center;padding: 0px">
                                             <img src="<?php echo $lead['photo']; ?>"  height="100px" width="100%">
                                         </div>
                                         <div class="card-footer" style="text-align: center;padding: 0px; background: rgba(232, 234, 237,0.3);">
                                             <b style="font-size:12px"><?php echo $lead['iname']; ?></b><br>
                                             (<?php echo $setting['curency']?$setting['curency']:''; ?> <?php echo $lead['price']; ?> /-)
                                              <br>
                                          </div>
                                      </div>
                                  </div>
                               <?php
                               }
                               ?>
        	               </div>
                           </section>
                            <?php
                        }
                        
                        ?>
                 </div>
                    
	           </div>
	       </div>
	       
	       <div class="col-sm-6" style="padding-left: 3px">
               <div class="card" style="width: 100%; height: 55vh; overflow-y: scroll; padding: 15px">
               
                  <div class="cart-container">
                      <div id="alerts"></div>
                          
                          <table style="width: 100%">
                                <thead>
                                    <tr>
                                        <th><strong>Description</strong></th>
                                        <th style='text-align: center'><strong>Qty</strong></th>
                                        <th style="text-align: right"><strong>Price</strong></th>
                                        <th style="text-align: right"><strong>Amount</strong></th>
                                    </tr>
                                </thead>
                                <tbody id="carttable">
                                </tbody>
                         </table>
                      </div>
                   </div> 
                   <table id="carttotals" style="width: 100%;background-color:#4E73DF;color: white; font-weight: 700;font-size: 20px">
                      <tr>
                         <td>Items : <span id="itemsquantity">0</span></td>
                         <td>
                             <div style="display: flex; width: 100%;font-size: 20px">
                                 <div> Total :</div>
                                 <div style="text-align: right;width: 80%;font-size: 20px"> <span id="total" >0</span></div>
                         </td>
                      </tr>
                   </table>
                    <div class="row" style="margin-top: 10px">
                       <div class="col-lg-6" style="margin-bottom:2px">
                          <select type="date" class="form-control form-control-user"  
                             placeholder="Type here" name="pby">
                             <?php
                                  if($pby){
                                         echo '<option value="'.$pby.'">'.$pby.'</option>';
                                    }
                               ?>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                <option value="Other">Other</option>
                          </select>
                      </div>
                      <div class="col-lg-6" style="margin-bottom:2px">
                         <input type="hidden" name="billno" value="<?php echo $last_bill; ?>">
                         <textarea name="remark" id="remark" placeholder="Remarks" style="width:100%;outline: #ededeb solid 1px;padding: 10px;border: 1px solid #ededeb;height: 40px;"><?php echo $remark; ?></textarea>
                       </div>    
                   </div>
                   <div class="col-sm-12">
                  <div class="row">
                      <div class="col-lg-3" style="margin-bottom:10px;padding: 2px;">
                         <?php
                          if($last_bill == $new_bill)
                            {
                                echo '<button type="submit" name="save" class="btn btn-success btn-block"><i class="fa fa-file-image-o"></i> Save</button>';
                            } 
                            else {
                                echo '<button type="submit" name="alter" class="btn btn-success btn-block"><i class="fa fa-file-image-o"></i> Alter</button>';
                            }
                         ?>
                       </div>
                       <div class="col-lg-3" style="margin-bottom:10px;padding: 2px;">
                         <a href="" style="text-decoration: none" ><button type="button" onclick="deleteData('data')" class="btn btn-warning btn-block" style="background: #ffc107; color: black; border: none;box-shadow: 0px 0px 5px silver;"><i class="fa fa-refresh"></i> Clear</button></a>
                        </div>
                        <div class="col-lg-3" style="margin-bottom:10px;padding: 2px;">
                            <button type="submit" name="last" class="btn btn-primary btn-block" style="background-color: #ffc107;color: black; border: none;box-shadow: 0px 0px 5px silver;"><i class="fa fa-caret-square-o-left"></i> Last Entry</button>
                       </div>
                       <div class="col-lg-3" style="margin-bottom:10px;padding: 2px;">
                            <button type="submit" name="next" class="btn btn-primary btn-block" style="background-color: #ffc107;color: black; border: none;box-shadow: 0px 0px 5px silver;"> Next Entry <i class="fa fa-caret-square-o-right"></i></button>
                       </div>
                        <?php
                          if($last_bill != $new_bill)
                            {
                                ?>
                                <div class="col-lg-3" style="margin-bottom:10px;padding: 2px;">
                                     <button type="submit" name="delete" class="btn btn-danger btn-block" style="background-color: #ffc107;color: black; border: none;box-shadow: 0px 0px 5px silver;"><i class="fa fa-trash"></i> Delete</button>
                                 </div>
                                <?
                            }
                         ?>
                      
                     
                     <div class="col-lg-3" style="margin-bottom:10px;padding: 2px;">
                         <?php
                          if($last_bill == $new_bill)
                            {
                                
                            } 
                            else {
                                echo '<a href="/bill/index.php?id='.$last_bill.'" style="text-decoration: none"><button type="button" class="btn btn-info btn-block"  style="background-color: #ffc107;color: black; border: none;box-shadow: 0px 0px 5px silver;"><i class="fa fa-print"></i> Print</button></a>';
                            }
                         ?>
                         <!---->
                     </div>
                  </div>
           </div>  
              </div>

             
      </div>
  </form>
</div>


<script>
    $(document).ready(function() {
      // executes when HTML-Document is loaded and DOM is ready
      document.getElementById('focusmeplease').focus();
    });

    // $(window).load(function() {
    //   // executes when complete page is fully loaded, including all frames, objects and images
    //   document.getElementById('focusmeplease').focus();
    // });

// function tabHighlight(tid) {
//     alert(tid);
//       $(document).ready(function () {
          
//             $(tid).effect("highlight", {
//                 color: "#FF0000"
//             }, 3000);       
//         });
// }
    
    
    stringCart = JSON.stringify(<?php print_r(json_encode($cart_temp)); ?>);
    sessionStorage.setItem("cart", stringCart); 
    updateCartTotal();
</script>
<script>

    function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
updateCartTotal();

function addToCart(name, price) {
    //   alert(data.iname)
    // Check browser support
    if (typeof(Storage) !== "undefined") {
      // Store
      var cart = [];
      
      let data = {'iname': name, 'price': price, 'qty': 1};
      
      
      var stringProduct = JSON.stringify(data);
      
      const d = new Date();
      
      d.setTime(d.getTime() + (365*24*60*60*1000));
      
      let expires = "expires="+ d.toUTCString();
      
  
      
      if(!sessionStorage.getItem('cart')){
            //append product JSON object to cart array
            cart.push(stringProduct);
            
            //cart to JSON
            stringCart = JSON.stringify(cart);
            //create session storage cart item
            sessionStorage.setItem('cart', stringCart);
            // addedToCart(getproductName);
            updateCartTotal();
        }
        else {
            //get existing cart data from storage and convert back into array
           cart = JSON.parse(sessionStorage.getItem('cart'));
        //   alert(data.iname)
            //append new product JSON object
            let temp = [];
            
            items = cart.length;
            
            var status = false;
            
            for (var i = 0; i < items; i++){
                var x = JSON.parse(cart[i]);
                
                if(x.iname == data.iname)
                {
                    status = true
                }
            }
            
            if(status)
            {
                for (var i = 0; i < items; i++){
                    var x = JSON.parse(cart[i]);
                    
                    if(x.iname == data.iname)
                    {
                        x.qty = x.qty + data.qty
                    } else {
                        x.qty = x.qty
                    }
                    
                    var stringProductX = JSON.stringify(x);
                    
                    temp.push(stringProductX)
                }
            } else {
                cart.push(stringProduct)
                
                temp = cart;
            }
            
            // cart.push(stringProduct);
            
            // console.log(cart)
            //cart back to JSON
            
            cart = temp
            
            stringCart = JSON.stringify(temp);
            //overwrite cart data in sessionstorage 
            sessionStorage.setItem('cart', stringCart);
            // addedToCart(getproductName);
            updateCartTotal();
        }
      
    //   document.cookie = "Cart=" + stringCart + ";" + expires + ";path=/";
      
    //   sessionStorage.setItem("lastname", name);
    //   // Retrieve
    //   document.getElementById("result").innerHTML = "<h1>"+sessionStorage.getItem("lastname")+"<h1>";
    } else {
      document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }
}
function incMent(iname){
    //init
    
    if(sessionStorage.getItem('cart')) {
        //get cart data & parse to array
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        
        stringCart = JSON.stringify(cart);
        
        //get no of items in cart 
        items = cart.length;
        
        let temp = [];
        
        //loop over cart array
        for (var i = 0; i < items; i++){
            //convert each JSON product in array back into object
            var x = JSON.parse(cart[i]);
            //get property value of price
            
            if(iname == x.iname)
            {
                x.qty = Number(x.qty) + 1
                
                var stringProductX = JSON.stringify(x);
                
                temp.push(stringProductX)
            } else {
               
               x.qty = Number(x.qty)
                
                var stringProductX = JSON.stringify(x);
                
                temp.push(stringProductX)
            }
        }
        
        stringCartTemp = JSON.stringify(temp);
        //overwrite cart data in sessionstorage 
        sessionStorage.setItem('cart', stringCartTemp);
        updateCartTotal();
    }
   
}

function decMent(iname){
    //init
    
    if(sessionStorage.getItem('cart')) {
        //get cart data & parse to array
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        
        stringCart = JSON.stringify(cart);
        
        //get no of items in cart 
        items = cart.length;
        
        let temp = [];
        
        //loop over cart array
        for (var i = 0; i < items; i++){
            //convert each JSON product in array back into object
            var x = JSON.parse(cart[i]);
            //get property value of price
            
            if(iname == x.iname)
            {
                x.qty = Number(x.qty) - 1
                
                var stringProductX = JSON.stringify(x);
                
                if(x.qty > 0)
                    temp.push(stringProductX)
            } else {
               
               x.qty = Number(x.qty)
                
                var stringProductX = JSON.stringify(x);
                
                temp.push(stringProductX)
            }
        }
        
        stringCartTemp = JSON.stringify(temp);
        //overwrite cart data in sessionstorage 
        sessionStorage.setItem('cart', stringCartTemp);
        updateCartTotal();
    }
   
}
/* Calculate Cart Total */
function updateCartTotal(){
    //init
    var total = 0;
    var price = 0;
    var items = 0;
    var items_count = 0;
    var productname = "";
    var carttable = "";
    const d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    
    if(sessionStorage.getItem('cart')) {
        //get cart data & parse to array
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        
        stringCart = JSON.stringify(cart);
        
        document.cookie = "Cart=" + stringCart + ";" + expires + ";path=/";
        //get no of items in cart 
        items = cart.length;
        //loop over cart array
        for (var i = 0; i < items; i++){
            //convert each JSON product in array back into object
            var x = JSON.parse(cart[i]);
            //get property value of price
            price = parseFloat(x.price);
            productname = x.iname;
            qty = x.qty;
            subtotal = price*qty;
            //add price to total
            //carttable += "<tr><td>" + productname + "</td><td style='text-align: center'><div style='display: flex'><p style='width:20px;height:20px;text-align:center' onclick='incMent(`"+productname+"`)'> +</p><div style='width: 100%;padding:4px;text-align:center'>"+qty+"</div><p style='width:20px;height:20px;text-align:center' onclick='decMent(`"+productname+"`)' >-</p></div></td><td style='text-align: right'> " + price.toFixed(2) + "</td><td style='text-align: right'> " + subtotal.toFixed(2) + "</td></tr>";
            carttable += "<tr><td>" + productname + "</td><td style='text-align: center'><div style='display: flex; height: 10px;margin-top: -10px'><p style='width:20px;height:25px;text-align:center;cursor: pointer; background: #ffc107; color: black;padding: 2px 4px ;' onclick='incMent(`"+productname+"`)'> +</button><div style='width: 100%;padding:0px;text-align:center'>"+qty+"</div><p style='width:25px;height:25px;text-align:center;cursor: pointer; background: #ffc107; color: black;padding: 2px 4px ;' onclick='decMent(`"+productname+"`)' >-</p></div></td><td style='text-align: right'> " + price.toFixed(2) + "</td><td style='text-align: right'> " + subtotal.toFixed(2) + "</td></tr>";
            total += subtotal;
            items_count +=Number(qty);
        }
    }
    
    //update total on website HTML
    document.getElementById("total").innerHTML = total.toFixed(2);
    document.cookie = "total=" + total.toFixed(2) + ";" + expires + ";path=/";
    
    //insert saved products to cart table
    document.getElementById("carttable").innerHTML = carttable;
    document.cookie = "carttable=" + carttable + ";" + expires + ";path=/";
    
    //update items in cart on website HTML
    document.getElementById("itemsquantity").innerHTML = items_count;
    document.cookie = "itemsquantity=" + items_count + ";" + expires + ";path=/";
    
}


function deleteData() {
    // alert("Deleted");
    // remove cart session storage object & refresh cart totals
    if(sessionStorage.getItem('cart')){
            sessionStorage.removeItem('cart');
          // clear message and remove class style
          var alerts = document.getElementById("alerts");
          alerts.innerHTML = "";
          if(alerts.classList.contains("message")){
              alerts.classList.remove("message");
          }
          
          //delete cookies
          const d = new Date();
          let expires = "expires="+ d.toUTCString();
          document.cookie = "Cart=;" + expires + ";path=/";
          document.cookie = "total=;" + expires + ";path=/";
          document.cookie = "carttable=;" + expires + ";path=/";
          document.cookie = "itemsquantity=;" + expires + ";path=/";
        //   document.getElementById("pby").value = "";
        //   document.getElementById("remark").value = "";
          updateCartTotal();
    }
}

"use strict";

var input = document.getElementById('input'), // input/output button
  number = document.querySelectorAll('.numbers div'), // number buttons
  operator = document.querySelectorAll('.operators div'), // operator buttons
  result = document.getElementById('result'), // equal button
  clear = document.getElementById('clear'), // clear button
  resultDisplayed = false; // flag to keep an eye on what output is displayed

// adding click handlers to number buttons
for (var i = 0; i < number.length; i++) {
  number[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if result is not diplayed, just keep adding
    if (resultDisplayed === false) {
      input.innerHTML += e.target.innerHTML;
    } else if (resultDisplayed === true && lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
      // if result is currently displayed and user pressed an operator
      // we need to keep on adding to the string for next operation
      resultDisplayed = false;
      input.innerHTML += e.target.innerHTML;
    } else {
      // if result is currently displayed and user pressed a number
      // we need clear the input string and add the new input to start the new opration
      resultDisplayed = false;
      input.innerHTML = "";
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// adding click handlers to number buttons
for (var i = 0; i < operator.length; i++) {
  operator[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if last character entered is an operator, replace it with the currently pressed one
    if (lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
      var newString = currentString.substring(0, currentString.length - 1) + e.target.innerHTML;
      input.innerHTML = newString;
    } else if (currentString.length == 0) {
      // if first key pressed is an opearator, don't do anything
      console.log("enter a number first");
    } else {
      // else just add the operator pressed to the input
      input.innerHTML += e.target.innerHTML;
    }

  });
}



</script>
<?php

        if($in_status)
        {
            echo "<script>deleteData();updateCartTotal();</script>";
            
        }
        ?>
        <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <!--<div class="modal-header">-->
      <!--  <h4 class="modal-title">Modal Heading</h4>-->
      <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
      <!--</div>-->

      <!-- Modal body -->
      <div class="modal-body">
      <div class="cardc">
        <div class="calc-head">
            <input maxlength="10" disabled="disabled" type="text" id="result"  style="color: black;">
        </div>
        <div class="cal-body">
            <div>
                <input type="button" class="btn11" value="C" onclick="cNumber()">
                <input type="button" class="btn11" value="+/-">
                <input type="button" class="btn11" value="%" onclick="insertNumber('%')">
                <input type="button" class="btn11" value="/" onclick="insertNumber('/')">
            </div>
            <div>
                <input type="button" class="btn11" value="7" onclick="insertNumber(7)">
                <input type="button" class="btn11" value="8" onclick="insertNumber(8)">
                <input type="button" class="btn11" value="9" onclick="insertNumber(9)">
                <input type="button" class="btn11 " value="X"onclick="insertNumber('*')">
            </div>
            <div>
                <input type="button" class="btn11" value="4" onclick="insertNumber(4)">
                <input type="button" class="btn11" value="5" onclick="insertNumber(5)">
                <input type="button" class="btn11" value="6" onclick="insertNumber(6)">
                <input type="button" class="btn11 " value="-"onclick="insertNumber('-')">
            </div>
            <div>
                <input type="button" class="btn11" value="1" onclick="insertNumber(1)">
                <input type="button" class="btn11" value="2" onclick="insertNumber(2)">
                <input type="button" class="btn11" value="3" onclick="insertNumber(3)">
                <input type="button" class="btn11 " value="+"onclick="insertNumber('+')">
            </div>
            <div>
                <input type="button" class="btn11" value="0" onclick="insertNumber(0)">
                <input type="button" class="btn11" value="." onclick="insertNumber('.')">
                <input type="button" class="btn11" value="DEL" onclick="deleteNumber()">
                <input type="button" class="btn11 " value="="onclick="calculate()">
            </div>
        </div>
    </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
  var resultField = $('#result');
function insertNumber (number) {
    var existingNumber = resultField.val()
    resultField.val(existingNumber + number )
};
function cNumber() {
    resultField.val('')
}
function calculate(){
    var result = eval(resultField.val())
    resultField.val(result)
}
function deleteNumber (){
    var valou = resultField.val()

    if(valou!='') {
        resultField.val(resultField.val().slice(0,-1));
    }
}
</script>
</body>
</html>
