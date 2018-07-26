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
  <style>
  @media (min-width: 768px) {
    .navbar .navbar-nav {
        display: inline-block;
        float: none;
        vertical-align: top;
    }

    .navbar .navbar-collapse {
        text-align: center;
    }
  
  .img-fluid{
    max-width:100%;
    max-height:auto;
  }
  }
  </style>
  </head>
  <body>
  <?php include_once 'navigation.php';?>
<div class="container">
  <div class="row">
    <div class="col-sm-6  col-sm-offset-4">
<?php
include_once 'dconnect.php';
/*
error_reporting(0);
if(!isset($_SESSION))
{
session_start();
}
if($_SESSION['ID'])
{
*/

$result = mysql_query('select * from Games'); 

if(!mysql_num_rows($result)){
  echo 'nothing in database';
}
else{
while($row=mysql_fetch_assoc($result))
{
 $id=$row["ID"];
 $name =$row["Title"];
 $publisher=$row["Publisher"];
 $developer=$row["Developer"];
 $yearreleased=$row["Year_Released"];
 $platform=$row["Platform"];
 $award=$row["Award"];
 $type=$row["Type"];
 $buyprice=$row['Buy_Price'];
 $rentprice=$row['Rent_Price'];
 $image_name=$row["Image"];
 $image_path=$row["Folder"];

 //echo $image_name;
 //echo $image_path;
 echo "<div class='row'><div class='col-sm-12 img-thumbnail'>";
 echo "<img src = '".$image_path.$image_name."'style='margin-right:2%' width='48%' height='58%' class='img-thumbnail pull-left'>";
 echo "<strong>Title: </strong>".$name."<br>";
 echo "<strong>Publisher: </strong>".$publisher."<br>";
 echo "<strong>Developer: </strong>".$developer."<br>";
 echo "<strong>Year_Released: </strong>".$yearreleased."<br>";
 echo "<strong>Platform: </strong>".$platform."<br>";
 echo "<strong>Award: </strong>".$award."<br>";
 echo "<strong>Type: </strong>".$type."<br>";
 echo "<strong>Buy Price: $</strong>".$buyprice."<br>";
 echo "<strong>Rent Price: $</strong>".$rentprice."<br><br>";

//echo $price; 

//if(!$stmt1){
 echo "<a href='games_bought.php?id=".$id."' class='btn btn-info btn-lg'>Buy</a><br><br>";

 //echo "<a href='rented.php?id=".$id."'>Rent</a>";
 echo "<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Rent</button>";
 echo '<div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">';
 echo '<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Enter Number of days</h4></div>';
 echo '<div class="modal-body">';
 echo ' <form action="games_rented.php" method="POST"><div class="form-group"><label for="sel1">Select Days:</label><select class="form-control" id="sel1" name="rent"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select></div><input type="hidden" name="idvalue" value="'.$id.'"/><input type="submit" class="btn btn-default" name="submit" value="Rent"></input></form></div></div></div></div>';
//}else{
//  echo "<strong>Booked</strong>";
//}
 echo "</div></div><br>";
 }
}
//echo "<img src = ".$image_path.$image_name." width=200 height=200>";
//echo $image_content;
 /*
}
else{
echo "You are not logged in.<br/>Please login to access this information <a href='signin.php'>Click here to login</a> ";
}
*/

?>
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