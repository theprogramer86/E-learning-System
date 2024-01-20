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

if($setting['bill_format'] == 'Bill Format 1')
{
    header('Location: /bill/bill-format-1.php?id=' . $billno);
} else {
    header('Location: /bill/bill-format-2.php?id=' . $billno);
}

?>