<?php
	if(validation_errors())
	{
		$error=array();
		if(@form_error('name')){ $error['name']=form_error('name'); }
		elseif(@form_error('email')){ $error['email']=form_error('email'); }
		elseif(@form_error('password')){ $error['password']=form_error('password'); }
		elseif(@form_error('confpassword')){ $error['confpassword']=form_error('confpassword'); }
		elseif(@form_error('gender')){ $error['gender']=form_error('gender'); }
		elseif(@form_error('country')){ $error['country']=form_error('country'); }
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - traffExchange</title>
<?php
	$this->load->view('master/master_links');
	$this->load->view('master_logo_menu');
	?>
    
    <style>
.login_box2 p
{
	margin:0 !important;
}
</style>
</head>
<body class="login_body">

	<div class="login_page">
    	<div class="container">
        	<div class="row no-gutters">
            	<div class="col-lg-4 col-md-4">
                   <div class="reg_box">
                    	<img src="<?php echo base_url(); ?>assets/image/coins.png" style="width:100px;" />
                        <h4>Rewards</h4>
                        <p>Register and get 50 coins free on successful registration.</p>
                        <p>Try Now &emsp;<i class="fa fa-arrow-right"></i></p>
                        <p>Already Have A Account? <a href="<?php echo site_url('Home/login'); ?>" class="d-inline text-warning">Login</a></p>
                    </div>
                </div>
                
                <div class="col-lg-8 col-md-8">
                    
                     <div class="login_box2">
                    	<h1 align="center">Register</h1>
                       <form method="post" enctype="multipart/form-data">
                        <div class="username">
                       		<input type="text" name="name" value="<?php echo @set_value('name');?>" placeholder="Enter Name"/>
                            <span class="text-danger p-0 m-0"><?php echo @$error['name']; ?></span>
                        </div>
                        <div class="username email">
                       		<input type="text" name="email" value="<?php echo @set_value('email');?>" placeholder="Enter Email"/>
                            <span class="text-danger p-0 m-0"><?php echo @$error['email']; ?></span>
                            <span class="text-danger p-0 m-0"><p><?php echo @$email_err; ?></p></span>
                       	
                        </div>
                       
                        <div class="username key">
                       		<input type="password" name="password" placeholder="Password (8 to 12 chars)" value="<?php echo @set_value('password');?>"/>
                        <span class="text-danger p-0 m-0"><?php echo @$error['password']; ?></span>
                        </div>
                        
                        <div class="username key">
                       		<input type="password" name="confpassword" placeholder="Confirm Password" value="<?php echo @set_value('confpassword');?>"/>
                        <span class="text-danger p-0 m-0"><?php echo @$error['confpassword']; ?></span>
                        </div>
                        
                        <div class="form-element">
                        
                         <input name="gender" type="radio" id="radio_30" class="with-gap radio-col-red" value="male" checked <?php if(@set_value('gender')=="male"){ echo "checked"; }?>/>
                         <label for="radio_30" class="pl-4">Male</label>
                         &emsp;
                         <input name="gender" type="radio" id="radio_40" class="with-gap radio-col-red" value="female" <?php if(@set_value('gender')=="female"){ echo "checked"; }?>/>
                         <label for="radio_40" class="pl-4">Female</label>
                       		<span class="text-danger p-0 m-0"><?php echo @$error['gender']; ?></span>
                        </div>
                        <div class="form-element pb-2">
                       		<select name="country" class="">
                            	<option value="">--Select Country--</option>
                                <?php
                                	foreach($country as $c){ ?>
										<option <?php if(@set_value('country')==$c['name']){ echo "selected"; } ?>><?php echo $c['name']; ?></option>	
								<?php }
								?>
                            </select>
                            <span class="text-danger p-0 m-0"><?php echo @$error['country']; ?></span>
                        </div>
                         <div class="form-element file-element">
                       		<input type="file" name="image"/>
                        </div>
                        <span class="text-danger p-0 m-0"><?php echo @$file_err; ?></span>
                       <hr>
                        <div class="login_btn">
                        	<input type="submit" name="register" class="btn btn-success" value="Register"/>
                        </div>
                        
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>