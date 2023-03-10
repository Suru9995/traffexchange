<!DOCTYPE html>
<html>
<head>


<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Linkedin Like</title>
</head>

<body>



<?php $this->load->view('master/user_master'); 
?>

    <?php if(!@$this->session->userdata('linkedin')){ ?>
	
    <div class="mt-3">
        	<h6>You must have a connected Linkedin account</h6><br>
        	<img src="<?php echo base_url('assets/image/Linkedin_logo.png');?>" height="120" width="120"/>
            <a class="btn mt-2 ml-3 p-3" style="background-color:#017BB6; color:#fff;" href="<?php echo $oauthURL_linkedin; ?>">Login with Linkedin</a>
        </div>
        
        	<br><h6>On successfull connection, you can Like someones post and get Rewards(credits).</h6>
        <hr><?php die;?>


    
	<?php } else {?>
    	
        
        <div class="w-50 rounded" style="border:2px solid gray; padding:10px;">
    	<div class="row no-gutters">
    		<div class="col-lg-5  col-md-5 col-sm-12 col-12"><img src="<?php echo $social_linked['picture']; ?>" class="rounded" height="150" width="150"></div>
    		
    		
    		<div class="col-lg-7 col-md-7 col-sm-12 col-12">
			<font class="lead">Name : <?php echo $social_linked['name']; ?></font><br><br>
		        <i class="fa fa-circle text-success"><font class="lead">&emsp;Active Now</font></i><br><br>
		        <a class="btn btn-primary" href="<?php echo site_url('Linkedin_data/logout'); ?>">Logout</a>
    		</div>
    	</div>
    </div>
        
    <?php }?>
    
    <hr>
</body>
</html>