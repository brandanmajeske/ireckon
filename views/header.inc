<?php include 'conf.inc.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo $pageTitle ?></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
       <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo $css; ?>/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $css; ?>/bootstrap-responsive.css" rel="stylesheet">
     <link href="<?php echo $css; ?>/custom.css" rel="stylesheet">
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo $host; ?>index.php">iReckon</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo $index; ?>">Your To-Do List</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="<?php echo $host; ?>contact.php">Contact</a></li>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

	<h1><?php echo $pageTitle ?></h1>

	<h2><?php echo $subHeading ?></h2>