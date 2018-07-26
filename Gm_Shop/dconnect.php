<?php
$mysql_servername = "localhost";
$mysql_username = "root";
$mysql_password = "macbookpro18";

// Create connection
$conn = mysqli_connect($mysql_servername, $mysql_username, $mysql_password);
mysqli_select_db($conn,"Gm_Shop") or die('Error');

// Check connection

?>