<?php
error_reporting(0);
if(isset($_POST['submit']))
{
  session_start();
  error_reporting(0);
   $user = $_POST['username'];
   $pwrd = $_POST['pwrd'];
   //echo $user;
   //echo $pwrd;
   //require database connection
   require 'dconnect.php';
    
    if($user && $pwrd)
    {
      $sql = "SELECT * FROM  Customer WHERE  `Email_ID` =  '".$user."' AND  `Password` =  '".$pwrd."'";
          $result = mysql_query($sql,$conn);
          $records = mysql_num_rows($result);
          $row = mysql_fetch_array($result);
          if ($records==0)
          {
          echo 'Please re-enter your password and username <br/><br/>
          The password or username you entered is incorrect. Please try again (make sure your caps lock is off).<br/><br/>';
          }
          else
          {
          $_SESSION['ID']=$row['ID'];
          $_SESSION['Name']=$row['Name'];
          //echo $_SESSION['ID'];
          //echo $_SESSION['Name'];
          header("Location: index.php");
          } 
          mysql_close($conn);
  }
  else
   {
    echo 'Please re-enter your password and username <br/><br/>
    The password or username you entered is incorrect. Please try again (make sure your caps lock is off).<br/><br/>';
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
<form action="login.php" method="post">
<div class="form-group">
    <label for="exampleInputEmail1">Email ID</label>
    <input type="text" class="form-control" name="username" placeholder=" Email ID">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pwrd" placeholder="Password">
  </div>
  
  
  
  <input type="submit" class="btn btn-default" name="submit" value="Login"></input>
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
