<?php
include_once 'dconnect.php';
error_reporting(0);
if(!isset($_SESSION))
{
session_start();
}
if($_SESSION['ID'])
{

$sql="select Buy_Price from Movies where ID=".$_GET['id'];
$result = mysql_query($sql); 
$count ="1";

if($row=mysql_fetch_assoc($result))
{
  
 $model =$row["Buy_Price"];
 //$pid = "10000";
 $custid=$_SESSION['ID'];
 $gid="0";
 $date1=date("Y-m-d");
 $mid=$_GET['id'];
 //echo $model."<br>";
 //echo $pid."<br>";
 //echo $custid."<br>";
 //echo $gid."<br>";
 //echo $date1."<br>";
 //echo $mid."<br>";
 
 $result =("INSERT INTO Buy (CustID,MID,GID,Price,Purchase_Date) VALUES ('".$custid."','".$mid."','".$gid."','".$model."','".$date1."')");
 mysql_query($result);

if($result){
  //header("location: movie.php");
  echo "Movie Bought<br>";
  echo "Thanks!!";
}
else{
  echo "not inserted";
}

 //$sql1 = "INSERT INTO Booking (C_Id,Name,Date,S_address,D_address,Email_Id,No_Pieces,Contact_No) VALUES (:ssd,:sas,:asas,:asafs,:sss,:ssa,:ssb,:ssc)";
 //$q = $conn->prepare($sql1);
 /*$q->execute(array(':ssd'=>$_GET["id"],':sas'=>$model,':asas'=>$date,':asafs'=>$address,':sss'=>$address,':ssa'=>$email,':ssb'=>$count,':ssc'=>$contact));
  if($q){
  echo "<h2>Booked</h2>";
  }
  */
 }
//echo "<img src = ".$image_path.$image_name." width=200 height=200>";
//echo $image_content;
}
else{
echo "You are not logged in.<br/>Please login to access this information <a href='login.php'>Click here to login</a> ";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>