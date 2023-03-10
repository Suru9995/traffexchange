<?php
	
		if(@form_error('price'))
		{
			$msg['price']=form_error('price');
		}elseif(@form_error('package_name'))
		{
			$msg['package_name']=form_error('package_name');
		}elseif(@form_error('name'))
		{
			$msg['name']=form_error('name');
		}elseif(@form_error('email'))
		{
			$msg['email']=form_error('email');
		}elseif(@form_error('mobile'))
		{
			$msg['mobile']=form_error('mobile');
		}
		
	
?>
<html>
<head>
<?php
$this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment</title>
<style>
#frm p,#frm .form-group{margin:0;}
</style>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

	

    <h2>Package Information</h2>

   
   	<small class="text-danger">* All fields are required</small>
   <br><br>	
	
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
   <form method="post" id="frm">
  <div class="form-group text-left">
  <input type="hidden" name="point" value="<?php echo $package['point'];?>" readonly>
  <input type="hidden" name="pid" value="<?php echo $package['p_id']; ?>">
  
	<input type="number" name="price" class="form-control" value="<?php echo $package['price'];?>" readonly>
    <span class="text-danger pl-2"><?php echo @$msg['price'];?></span>
  </div>
  <div class="form-group text-left">
    <input type="text"  name="package_name" class="form-control" value="<?php echo $package['package_name'];?>" readonly>
    <small class="text-danger pl-2"><?php echo @$msg['package_name'];?></small>
  </div>
  <div class="form-group text-left">
    <input type="text"  name="name" class="form-control" placeholder="Enter Full Name" value="<?php echo @set_value('name');?>">
    <small class="text-danger pl-2"><?php echo @$msg['name'];?></small>
  </div>
   <div class="form-group text-left">

	<input type="email"  name="email" class="form-control" placeholder="Enter email"  value="<?php echo $info['email'];?>">
    <small class="text-danger pl-2"><?php echo @$msg['email'];?></small>

  </div>
  <div class="form-group text-left">
    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile number" value="<?php echo @set_value('mobile');?>">
    <small class="text-danger pl-2"><?php echo @$msg['mobile'];?></small>
  </div>
<div class="text-right">
  <button type="submit" name="checkout" value="checkout" class="btn btn-primary">Checkout</button>
    <button type="reset" value="reset" class="btn btn-danger" name="cancel" onClick="">Cancel</button>
    </div>
</form>
</div>

    
</body>
</html>