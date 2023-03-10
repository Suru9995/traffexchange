<!DOCTYPE html>
<html>
<head>

<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Linkedin Follow</title>
</head>

<body>
	<?php $this->load->view('master/user_master'); 
    
        $user_post="";
        $user="";
        $cpc="";
        $post="";
    ?>

    <?php if(!@$this->session->userdata('linkedin')){ ?>
	
    <div class="mt-3">
        	<h6>You must have a connected Linkedin account</h6><br>
        	<img src="<?php echo base_url('assets/image/Linkedin_logo.png');?>" height="120" width="120"/>
            <a class="btn mt-2 ml-3 p-3" style="background-color:#017BB6; color:#fff;" href="<?php echo $oauthURL_linkedin; ?>">Login with Linkedin</a>
        </div>
        
        	<br><h6>On successfull connection, you can post someone message, youtube link, website link. And get Rewards(credits).</h6>
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
    
    <?php
    	
		if(empty($linked_follow))
		{
			echo "<h1>No More Post Available</h1>";die;
		}
		
		$url=@$linked_follow['url'];
		$user=@$linked_follow['uid'];
		$cpc=@$linked_follow['cpc'];
		$post=@$linked_follow['post_id'];
    	
		
		$n_url= strstr($url,'/?',true); 
		$id= substr($n_url,33); 
		
	?>
    
    <h2>Linkedin Company Follows</h2>
    <p>When You Click <strong>"Follows Company"</strong> Button it Automatically Follows a company On behalf of You in Linkedin Account</p>
    
    
    <button id="user_follow">follows company</button>     
     
<script>
	$(document).ready(function(e) {
        $('#user_follow').click(function(){
			$.ajax({
				type:'POST',
				url:"<?php echo site_url('Linkedin_data/user_post_follow'); ?>",
				data:{
					linkid:"<?php echo $id; ?>"
				},
				success: function(data){
				
					if(data==1){
						alert('Follow Company Successfully');
						ajax_insert();	
					} else {
						alert('Not Follow successfully');
					}
				
				}
				
			});
		});
    });
	
	
	function ajax_insert(){
		$.ajax({
				type:'POST',
				url:"<?php echo site_url('Website_ctrl/ajax_hits'); ?>",
				data:{
					p_id:"<?php echo $post; ?>",
					user:"<?php echo $user; ?>",
					cpc:"<?php echo $cpc; ?>"				
				},
				success:function(data){
					window.location.reload();
				}
					
			});	
	}
	
</script>

</body>
</html>