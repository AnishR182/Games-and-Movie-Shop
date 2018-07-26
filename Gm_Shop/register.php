<?php
session_start();

if(isset($_SESSION['ID'])){
  header("Location: index.php");
}

include_once 'dconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $address= $_POST['address'];
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $contactno= $_POST['contactno'];
    //$id="11113";
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/^[a-zA-Z ]+$/",$address)) {
        $error = true;
        $address_error = "Address must contain only alphabets and numbers";
  }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
    $result = "INSERT INTO Customer (Name,Address,Password,Contact_No,Email_ID) VALUES ('".$name."','".$address."','".$password."','".$contactno."','".$email."')";
    mysql_query($result);
    header("location: index.php");
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
    <?php include_once 'navigation.php';?>

<div class="container" style="text-align: center;">
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<form action="register.php" method="post">
<div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" name="username" placeholder=" User Name" required value="<?php if($error) echo $name; ?>">
    <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" name="address" placeholder=" Address" required value="<?php if($error) echo $address; ?>">
    <span class="text-danger"><?php if(isset($address_error)) echo $address_error; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="Email" placeholder="Email" value="<?php if($error) echo $email; ?>">
    <span class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contact Number</label>
    <input type="tel" class="form-control" name="contactno" placeholder="Contact number" value="<?php if($error) echo $contactno; ?>">
    <span class="text-danger"><?php if(isset($contactno_error)) echo $contactno_error; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" >
    <span class="text-danger"><?php if(isset($password_error)) echo $password_error; ?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" >
    <span class="text-danger"><?php if(isset($cpassword_error)) echo $cpassword_error; ?></span>
  </div>
  
  
  <input type="submit" class="btn btn-default" name="submit" value="Register"></input>
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
