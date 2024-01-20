<?php
session_start();

include("../config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: ../login.php");
}

date_default_timezone_set('Asia/Kolkata');

$company = '';
$ename = '';
$user = '';

if($_SESSION["Company"])
    $company = $_SESSION["Company"];
    
if($_SESSION["Username"])
    $user = $_SESSION["Username"];

$billno = $_GET['id'];

$setting = $conn->query("SELECT * FROM setting where company = '".$company."' ")->fetch_assoc();


$items = array();

$i_sqlddd = "SELECT * FROM sales where billno = '".$billno."'";
$i_resultdd = $conn->query($i_sqlddd);
while($row = $i_resultdd->fetch_assoc()) {
    array_push($items,$row);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Latest compiled and minified CSS -->

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <!--    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"-->
    <!--    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"-->
    <!--    crossorigin="anonymous"></script>-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include('common/header.php'); ?>
    <!-- Invoice styling -->
    <style>
        /*.container {*/
        /*    margin-top: 20px;*/
        /*    padding: 5px;*/
        /*    width: 50%;*/
        /*}*/

        /*.content {*/
        /*    border: 2px solid black;*/
        /*    padding: 5px;*/
        /*}*/

        /*.heading {*/
        /*    border-top: 2px solid black;*/
        /*    border-bottom: 2px solid black;*/
        /*    border-top-width: 100%;*/
        /*}*/

        /*tr.before-total>td {*/
        /*    padding-bottom: 3em;*/
        /*}*/

        /*tr.total>th {*/
        /*    border-top: 2px solid black;*/
        /*    border-bottom: 2px solid black;*/
        /*}*/

        /*tr.for-label>th {*/
        /*    padding-top: 2em;*/
        /*}*/
    </style>
</head>

<body>
    <div class="container">
    <div style="width: 100%;padding: 20px;">
        <div class="content" style="background-color: white; margin-bottom: 20px;">
            <div class="row">
                <div class="col" style="text-align: center;">
                    <img src="../<?php echo $setting['web_logo']?$setting['web_logo']:'img/upload.jpg'; ?>" height="100px" /><br />
                    <span style="font-weight: 700;font-size: 25px;"><?php echo $company; ?></span><br />
                    <?php echo $setting['add1']?$setting['add1']:''; ?><br />
                    <?php echo $setting['add2']?$setting['add2'].'<br />':''; ?>
                    <?php echo $setting['add3']?$setting['add3'].'<br />':''; ?>
                </div>
            </div>

            <div class="row">
                <div class="col" style="text-align: center;">
                    <h3 style="font-weight: 700;"><?php echo $setting['bill_head']?$setting['bill_head']:''; ?></h3>
                </div>
            </div>
            <div style="display: flex;width: 100%">
                <div style="width: 85%">
                    <p>No#<?php echo $billno; ?></p>
                </div>
                <div style="width: 15%">
                    <p>Date : 16-09-2021</p>
                    <p>Time : 05:30:05 PM</p>
                </div>
            </div>

            <div style="display: flex;width: 100%;border-bottom: 2px solid black;border-top: 2px solid black;">
                <div style="width: 60%;padding: 5px 15px">
                    <p>Particulars</p>
                </div>
                <div style="width: 20%;text-align: right;padding: 5px 15px">
                    Qty
                </div>
                <div style="width: 20%;text-align: right;padding: 5px 15px">
                    Price
                </div>
                <div style="width:20%;text-align: right;padding: 5px 15px">
                    Amount
                </div>
            </div>

            <?php
            $total = 0;
            $qty = 0;
            
            foreach($items as $data)
            {
                ?>
                <div style="display: flex;width: 100%;border-bottom: 2px solid silver;">
                    <div style="width: 60%;padding: 5px 15px">
                        <?php echo $data['iname']; ?>
                    </div>
                    <div style="width: 20%;text-align: right;padding: 5px 15px">
                        <?php echo $data['quan']; ?>
                    </div>
                    <div style="width: 20%;text-align: right;padding: 5px 15px">
                        <?php echo $setting['curency']?$setting['curency']:''; ?> <?php echo $data['amount']; ?>
                    </div>
                    <div style="width:20%;text-align: right;padding: 5px 15px">
                        <?php echo $setting['curency']?$setting['curency']:''; ?> <?php echo $data['quan']*$data['amount']; ?>
                    </div>
                </div>
                <?php
                $total = $total + $data['quan']*$data['amount'];
                $qty = $qty + $data['quan'];
            }
            ?>
             <div style="display: flex;width: 100%;border-bottom: 2px solid black;border-top: 2px solid black;">
                <div style="width: 60%;padding: 5px 15px">
                    <p>TOTAL</p>
                </div>
                <div style="width: 20%;text-align: right;padding: 5px 15px">
                    <?php echo $qty; ?>
                </div>
                <div style="width: 20%;text-align: right;padding: 5px 15px">
                       
                    </div>
                <div style="width:20%;text-align: right;padding: 5px 15px">
                    <?php echo $setting['curency']?$setting['curency']:''; ?> <?php echo $total; ?>
                </div>
            </div>
            <div class="row">
                <h6 style="text-align:center"><?php echo $setting['msg']?$setting['msg']:''; ?></h6>
            </div>
        </div>

    </div>
    </div>
    </div>
    <script type="text/javascript">

$(document).ready(function () {
    window.print();
});

 window.onafterprint = function() {
        // window.location.href('Location : http://pos-lite.eshop.life/kool-pos/temp-pos.php');
        window.location.replace("http://koolpos.eshop.life/temp-pos.php");
    };


</script>
</body>

</html>