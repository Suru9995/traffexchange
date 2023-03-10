<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

	
<div class="change_pass text-left">

	<form method="post">
    	<div class="form-group">
        	<div class="col">
            	<label><b>Old Password</b></label>&emsp; <span class="text-danger lead"><?php echo @$err_msg; ?></span>
            	<input type="password" name="old_pass" placeholder="Enter Old Password" class="form-control" required />
            </div>
        </div>
        
        <div class="form-group">
        	<div class="col">
            	<label><b>New Password</b></label>
            	<input type="password" name="new_pass" placeholder="Enter New Password" class="form-control" required />
            </div>
        </div>
        
        <div class="form-group">
        	<div class="col">
            	<label><b>Confirm Password</b></label>&emsp; <span class="text-danger lead"><?php echo @$err_msg2; ?></span>
            	<input type="password" name="conf_pass" placeholder="Enter Confirm Password" class="form-control" required />
            </div>
        </div>
        <div class="form-group">
        	<div class="col">
            	<input type="submit" name="change" class="btn btn-outline-primary btn-lg" value="Change" />
            </div>
        </div>
    </form>

</div>
    
   

    
</body>
</html>