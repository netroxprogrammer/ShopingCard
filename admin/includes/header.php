<?php include_once '/../../config/config.php';?>
<?php include_once '/../../config/Links.php';?>
<?php include_once '/../../libraries/Database.php';?>
<?php include_once '/../../libraries/Upload.php';?>
<?php 
$links = new SetLinks();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Php Shoping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="bootstrap/css/mystyle.css" rel="stylesheet">
   
  <body>
  <?php if(isset($_SESSION['hidden']) && isset($_SESSION['role'])=="admin") { ?> 
  		
 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Php Shoping Cart</a>
    </div>
    <ul class="nav navbar-nav">
    <?php $links->addLinks("index.php","addProduct.php","","","");?>
      <li class="active"><a href="<?php echo $links->homepage ?>">Home</a></li>
      <li><a href="<?php echo $links->addProductPage?>">Add Products</a></li>
      <li><a href="<?php echo $links->search?>">Search</a></li> 
      <li><a href="<?php echo $links->Edit?>">Edit</a></li> 
       <li><a href="<?php echo $links->usersInformation?>">Users Information</a></li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
  </div>
</nav>
<?php }
?>
    <div class="container">