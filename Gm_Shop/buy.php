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
      <a class="navbar-brand" href="#">Gm Shop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
       
          <li><a href="employee.php">Employee</a></li>
          <li><a href="supplier.php">Supplier</a></li>
          <li><a href="customer.php">Customer</a></li>
          <li><a href="buy.php">Buy</a></li>
          <li><a href="rent.php">Rent</a></li>
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
<form>
<div class="form-group">
    <label for="exampleInputEmail1">Customer Id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Customer Id">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Game Id</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Game id">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Movie Id</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Movie Id">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">P Id</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="P Id">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Price">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Purchase Date</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Purchase Date">
  </div>
  <input type="submit" class="btn btn-default"></input>
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