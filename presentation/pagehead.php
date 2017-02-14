<!DOCTYPE html>
<html>
<head>
  <title>Pizzeria</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/main.css">
</head>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="main.php">Pizza Palace</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php if (isset($_SESSION["user"])){
            ?> <p class="navbar-text">Logged as <?php print($_SESSION["user"][0]->getVoornaam()); ?></p>
            <li><a href="main.php?action=logout">Logout</a></li>
            <?php } else {?>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
              <?php } ?>
              <a class="navbar-brand">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                (<?php
                if (isset($_SESSION["user"])) {
                  print(count($db));
                } else {
                  if (isset($_SESSION["cart"]))
                  {print($_SESSION["totalshop"]);
                  }
                }?>)
              </a>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </header>
    <body>
