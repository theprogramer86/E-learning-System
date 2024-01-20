<?php

session_start();

include("config/database.php");

if(empty($_SESSION["Username"]))
{
    header("location: login.php");
}

$bill = $_GET['bill'];

                
    $last_qc = "SELECT sno FROM student where sno = '".$bill."'";
    $last_rc = $conn->query($last_qc);
    
    if ($last_rc->num_rows > 0) {
        
        $sql_sale = "DELETE FROM student WHERE sno = '".$bill."' ";
        if ($conn->query($sql_sale) === TRUE) {
            echo "<script>window.alert('Deleted Successfully!');window.location.href = 'student-list.php';</script>";
            
            
        } else {
             echo "<script>window.alert('Samething went wrong!');window.location.href = 'student-list.php';</script>";
        }
    } else {
        echo "<script>window.alert('No record found!');window.location.href = 'student-list.php';</script>";
    }
?>