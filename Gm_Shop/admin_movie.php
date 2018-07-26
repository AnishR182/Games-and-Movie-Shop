<?php
session_start();

if(!isset($_SESSION['ID'])){
  header("location: admin_login.php");
}

include_once 'dconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $actor = $_POST['actor'];
    $actress = $_POST['actress'];
    $year_made = $_POST['year_made'];
    $award= $_POST['award'];
    $director= $_POST['director'];
    $type= $_POST['type'];
    $buy_price= $_POST['buy_price'];
    $rent_price= $_POST['rent_price'];
    $upload_image=$_FILES["image"]["name"];
    $folder="Image/";
    move_uploaded_file($_FILES["image"]["tmp_name"], "$folder".$_FILES["image"]["name"]);

    //$id="11113";
    
    //name can contain only alpha characters and space
    if (!$name) {
        $error = true;
        $name_error = "Enter name";
    }
    if (!$actor) {
        $error = true;
        $actor_error = "Enter actor";
    }
    if (!$actress) {
        $error = true;
        $actress_error = "Enter actress";
    }
    if (!$year_made) {
        $error = true;
        $year_made_error = "Enter year_made";
    }
    if (!$award) {
        $error = true;
        $award_error = "Enter award";
      }
      if (!$director) {
        $error = true;
        $director_error = "Enter director";
      }
      if (!$type) {
        $error = true;
        $type_error = "Enter type";
      }
      if (!$buy_price) {
        $error = true;
        $buy_price_error = "Enter buy_price";
      }
      if (!$rent_price) {
        $error = true;
        $rent_price_error = "Enter rent_price";
      }
      if (empty($_FILES) || !isset($_FILES['image'])) {
        $error = true;
        $image_error = "Please upload image";
      }
      

    if (!$error) {
    $result = "INSERT INTO Movies (Name,Actor,Actress,Year_Made,Award,Director,Type,Buy_Price,Rent_Price,Image,Folder) VALUES ('".$name."','".$actor."','".$actress."','".$year_made."','".$award."','".$director."','".$type."','".$buy_price."','".$rent_price."','".$upload_image."','".$folder."')";
    mysql_query($result);
    //echo $title;
    //echo $publisher;
    //echo $developer;
    //echo $year_released;
    //echo $platform;
    //echo $award;
    //echo $type;
    //echo $buy_price;
    //echo $rent_price;
    header("location: admin_index.php");
    /*
        if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        
    } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    */
    }
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
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin_index.php">Gm Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
       
          <li><a href="admin_employee.php">Employee</a></li>
          <li><a href="admin_supplier.php">Supplier</a></li>
          <li><a href="admin_customer.php">Customer</a></li>
          <li><a href="admin_movie.php">Movies</a></li>
          <li><a href="admin_game.php">Games</a></li>
           </ul>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      
<?php

error_reporting(0);
if(!isset($_SESSION))
{
session_start();
}
if($_SESSION['ID'])
{
echo '<li><a href="admin_logout.php">Logout</a></li>';
}
else{
echo '<li><a href="admin_login.php">Login</a></li>';
}

?>
<!--<li><a href="login.php">Login</a></li>-->
<!--<li><a href="logout.php">Logout</a></li>-->
<!--<li><a href="register.php">Register</a></li>-->
            
         
        </ul>
</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container" style="text-align: center;">
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<form action="admin_movie.php" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control" name="name" placeholder=" Name" required value="<?php if($error) echo $name; ?>">
    <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>
  </div>
  <div class="form-group">
    <label >Actor</label>
    <input type="text" class="form-control" name="actor" placeholder="Actor" value="<?php if($error) echo $actor; ?>">
    <span class="text-danger"><?php if(isset($actor_error)) echo $actor_error; ?></span>
  </div>
  <div class="form-group">
    <label >Actress</label>
    <input type="text" class="form-control" name="actress" placeholder="Actress" value="<?php if($error) echo $actress; ?>">
    <span class="text-danger"><?php if(isset($actress_error)) echo $actress_error; ?></span>
  </div>
  <div class="form-group">
    <label >Year_Made</label>
    <input type="text" class="form-control" name="year_made" placeholder="Year_Made" >
    <span class="text-danger"><?php if(isset($year_made_error)) echo $year_made_error; ?></span>
  </div>
  <div class="form-group">
    <label >Award</label>
    <input type="text" class="form-control" name="award" placeholder="Award" >
    <span class="text-danger"><?php if(isset($award_error)) echo $award_error; ?></span>
  </div>
  <div class="form-group">
    <label >Type</label>
    <input type="text" class="form-control" name="type" placeholder="Type" >
    <span class="text-danger"><?php if(isset($type_error)) echo $type_error; ?></span>
  </div>
  <div class="form-group">
    <label >Buy Price</label>
    <input type="text" class="form-control" name="buy_price" placeholder="Buy Price" >
    <span class="text-danger"><?php if(isset($buy_price_error)) echo $buy_price_error; ?></span>
  </div>
  <div class="form-group">
    <label >Rent Price</label>
    <input type="text" class="form-control" name="rent_price" placeholder="Rent Price" >
    <span class="text-danger"><?php if(isset($rent_price_error)) echo $rent_price_error; ?></span>
  </div>
  <div class="form-group">
    <label >Director</label>
    <input type="text" class="form-control" name="director" placeholder="Director" >
    <span class="text-danger"><?php if(isset($director_error)) echo $director_error; ?></span>
  </div>
  <div class="form-group">
    <label >Image</label>
    <input type="file" class="form-control" name="image">
    <span class="text-danger"><?php if(isset($image_error)) echo $image_error; ?></span>
  </div>
  <input type="submit" class="btn btn-default" name="submit" value="Add"></input>
</form>
</div>
<div class="col-sm-2">
</div>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
