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
    
<?php include_once 'navigation.php' ?>

<div class="container">
  <div class="row">
    <div class="col-sm-6  col-sm-offset-4">
    <table class="table">
      <thead>
      <tr>
       
        <th>Customer Name</th>
        <th>Name of the Item Purchased</th>
        
      </tr>
      </thead>
      <tbody>
<?php

include_once 'dconnect.php';

error_reporting(0);
if(!isset($_SESSION))
{
session_start();
}
if($_SESSION['ID'])
{
$sql="select DISTINCT MID,GID from Buy where CustID='".$_SESSION['ID']."'";
$result = mysql_query($sql,$conn);
          //$records = mysql_num_rows($result);         
while($row = mysql_fetch_array($result))
{
 $mid =$row["MID"];
 $gid =$row["GID"];
    if($mid!=NULL ){
    $sql1="select Name from Movies where ID='".$mid."'";
    $result1 = mysql_query($sql1,$conn);
    while($row1 = mysql_fetch_array($result1))
    {
     $name1=$row1["Name"];
     echo "<tr>";
     echo "<td>".$_SESSION['Name']."</td>";
     echo "<td>".$name1."</td>";
     echo "</tr>";
     }
    }
    else if($gid != 0){
      $sql2="select Title from Games where ID='".$gid."'";
      $result2 = mysql_query($sql2,$conn);
          while($row2 = mysql_fetch_array($result2))
        {
         $name2=$row2["Title"];
         echo "<tr>";
         echo "<td>".$_SESSION['Name']."</td>";
         echo "<td>".$name2."</td>";
         echo "</tr>";
         }
    }
}
}
else{
echo "You are not logged in.<br/>Please login to access this information <a href='signin.php'>Click here to login</a> ";
}
?>
          </tbody>
        </table>

      </div>
    </div>
    <div class="row">
    <div class="col-sm-6  col-sm-offset-4">
    <table class="table">
      <thead>
      <tr>
       
        <!--<th>Customer Name</th>-->
        <!--<th>Name of the Item Rented</th>-->
        
      </tr>
      </thead>
      <tbody>
<?php

include_once 'dconnect.php';
if($_SESSION['ID'])
{
$sql3="select DISTINCT M_ID,G_ID from Rent where Cust_ID='".$_SESSION['ID']."'";
$result3 = mysql_query($sql3,$conn);
          //$records = mysql_num_rows($result);         
while($row3 = mysql_fetch_array($result3))
{
  
 $mid =$row3["M_ID"];
 $gid =$row3["G_ID"];
    if($mid!=NULL ){
    $sql4="select Name from Movies where ID='".$mid."'";
    $result4 = mysql_query($sql4,$conn);
    while($row4 = mysql_fetch_array($result4))
    {
     $name4=$row4["Name"];
     echo "<tr>";
     echo "<td>".$_SESSION['Name']."</td>";
     echo "<td>".$name4."</td>";
     echo "</tr>";
     }
    }
    else if($gid != 0){
      $sql5="select Title from Games where ID='".$gid."'";
      $result5 = mysql_query($sql5,$conn);
          while($row5 = mysql_fetch_array($result5))
        {
         $name5=$row5["Title"];
         echo "<tr>";
         echo "<td>".$_SESSION['Name']."</td>";
         echo "<td>".$name5."</td>";
         echo "</tr>";
         }
    }
}
}
else{
echo "You are not logged in.<br/>Please login to access this information <a href='signin.php'>Click here to login</a> ";
}
?>
          </tbody>
        </table>

      </div>
    </div>
</div>
<?php include_once 'footer.php' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>