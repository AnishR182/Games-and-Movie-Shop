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
            $search = $_POST['searchquery'];
            //echo $search;
            $sql = "select * from Movies WHERE MATCH (Name,Actor,Actress,Year_Made,Award,Director,Type) AGAINST ('".$search."')";
            $result = mysql_query($sql,$conn); 

            if(!mysql_num_rows($result)){
                $sql1 = "select * from Games WHERE MATCH (Title,Publisher,Developer,Year_Released,Platform,Award,Type) AGAINST ('".$search."')";
                $result1 = mysql_query($sql1,$conn); 
                if(!mysql_num_rows($result1)){
                  echo 'nothing in database';
                }
                else{
                  while($row=mysql_fetch_assoc($result1))
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
                   echo "<img src = '".$image_path.$image_name."'style='margin-right:2%' width='40%' height='50%' class='img-thumbnail pull-left'>";
                   echo "<strong>Title: </strong>".$name."<br>";
                   echo "<strong>Publisher: </strong>".$publisher."<br>";
                   echo "<strong>Developer: </strong>".$developer."<br>";
                   echo "<strong>Year_Released: </strong>".$yearreleased."<br>";
                   echo "<strong>Platform: </strong>".$platform."<br>";
                   echo "<strong>Award: </strong>".$award."<br>";
                   echo "<strong>Type: </strong>".$type."<br>";
                   echo "<strong>Buy Price: $</strong>".$buyprice."<br>";
                   echo "<strong>Rent Price: $</strong>".$rentprice."<br>";

                  //echo $price; 

                  //if(!$stmt1){
                   echo "<a href='games_bought.php?id=".$id."'>Buy</a></br>";

                   echo "<a href='games_rented.php?id=".$id."'>Rent</a>";
                  //}else{
                  //  echo "<strong>Booked</strong>";
                  //}
                   echo "</div></div><br>";
                 }
                }
            }
            else{
            while($row=mysql_fetch_assoc($result))
            {
              $id=$row["ID"];
             $name =$row["Name"];
             $actor=$row["Actor"];
             $actress=$row["Actress"];
             $yearmade=$row["Year_Made"];
             $director=$row["Director"];
             $award=$row["Award"];
             $price=$row["Price"];
             $type=$row["Type"];
             $buyprice=$row['Buy_Price'];
             $rentprice=$row['Rent_Price'];
             $image_name=$row["Image"];
             $image_path=$row["Folder"];

             //echo $image_name;
             //echo $image_path;
             echo "<div class='row'><div class='col-sm-12 img-thumbnail'>";
             echo "<img src = '".$image_path.$image_name."'style='margin-right:2%' width='40%' height='50%' class='img-thumbnail pull-left'>";
             echo "<strong>Movie Name: </strong>".$name."<br>";
             echo "<strong>Actor Name: </strong>".$actor."<br>";
             echo "<strong>Actress Name: </strong>".$actress."<br>";
             echo "<strong>Year Made: </strong>".$yearmade."<br>";
             echo "<strong>Director: </strong>".$director."<br>";
             echo "<strong>Award: </strong>".$award."<br>";
             echo "<strong>Type: </strong>".$type."<br>";
             echo "<strong>Buy Price: $</strong>".$buyprice."<br>";
             echo "<strong>Rent Price: $</strong>".$rentprice."<br>";

            //echo $price; 

            //if(!$stmt1){
             echo "<a href='bought.php?id=".$id."'>Buy</a></br>";

             echo "<a href='rented.php?id=".$id."'>Rent</a>";
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
<?php include_once 'footer.php' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>