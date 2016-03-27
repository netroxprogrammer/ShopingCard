<?php session_start(); ?>
<?php include_once 'includes/header.php'; ?>

<?php include_once 'includes/slideShow.php'; ?><br>
<div class="row">
<div class="col-xs-12 well ">
<p  class="btn btn-success btn-lg btn-block">Add Product</p>
</div>
</div>

<form  role="form">

<div class="row">             <!-- Start Row -->
<div class="col-xs-3 well">   <!-- Start Col -->
  <div class="form-group">
    <label  for="PName">Product Name</label>
    <input type="email" class="form-control" name="PName" placeholder="Product Name">
  </div>
</div> <!-- End Col --> 
<div class="col-xs-3 col-xs-offset-1 well ">      <!-- Start Col -->
<div class="form-group">
    <label  for="PName">Product Price</label>
    <div class="input-group">
      <div class="input-group-addon">PAK</div>
      <input type="text" class="form-control" name="PPrice" placeholder="Product Price">
      <div class="input-group-addon">.00</div>
    </div>
  </div>  
  </div>
  <!-- End Col --> 
  <div class="col-xs-3 col-xs-offset-1 well ">      <!-- Start Col -->
  <div class="form-group">
    <label for="PPic">Chose Photo</label>
    <input type="file" name="PPic">
    
  </div>
   </div>
  <!-- End Col --> 

  </div> <!--  End Row -->
  
  <div class="row">
  <div class="col-xs-12 well">
   <div class="form-group">
      <label for="Discription">Discription</label>
      <textarea class="form-control" rows="5" name="PDis"></textarea>
    </div>
  </div>
  </div>
  
  
    <div class="row">
  <div class="col-xs-12 well">
   <label for="category">Category</label>
   <select name="category" class="form-control">
  <option>Games</option>
  <option>Videos</option>
  <option>Cds</option>
  <option>Clothes</option>
  <option>Toys</option>
  <option>Books</option>
  <option>Mobiles</option>
  <option>Computers</option>
</select>
  </div>
  </div>
  <div class="row">             <!-- Start Row -->
<div class="col-xs-3 well">   <!-- Start Col -->
  <div class="form-group">
    <label  for="PName">Product Owner</label>
    <input type="email" class="form-control" name="POwner" placeholder="Product Owner">
  </div>
</div> <!-- End Col --> 
</div>
  <button type="button" class="btn btn-primary btn-lg btn-block">Post Product</button>
<?php include_once 'includes/footer.php'; ?>
