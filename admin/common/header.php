<?php
include_once('config/database.php');

$websetting = $conn->query('SELECT * FROM zapp_setting')->fetch_assoc();

?>
<link rel="icon" href="img/e-logo.png" />
<title><?php echo $websetting['web_name']; ?></title>
