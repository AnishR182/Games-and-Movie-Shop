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
      <a class="navbar-brand" href="index.php">GM SHOP</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
          <li><a href="movie.php">Movies</a></li>
          <li><a href="game.php">Games</a></li>
      </ul>
      <form class="navbar-form navbar-right" action="searchquery.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="searchquery">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
        <ul class="nav navbar-nav navbar-right">
            <?php
            error_reporting(0);
            if(!isset($_SESSION))
            {
            session_start();
            }
            if($_SESSION['ID'])
            {
            echo '<li><a href="logout.php">Logout</a></li>';
            echo '<li><a href="trancation.php">Transaction</a></li>';
            }
            else{
            echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
            <!--<li><a href="login.php">Login</a></li>-->
            <!--<li><a href="logout.php">Logout</a></li>-->
            <li><a href="register.php">Register</a></li>
        </ul>
      <!-- /.navbar-collapse -->
     </div><!-- /.container-fluid -->
</nav>