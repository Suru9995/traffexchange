<!DOCTYPE html>
<html>
<head>


<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Facebook Page</title>
</head>

<body>



<?php $this->load->view('master/user_master'); 
	
	$user_post="";
	$user="";
	$cpc="";
	$post="";
	$s_id='';
	
	
	//echo $user_post;
	
?>
<div>
	<?php if ( ! $this->facebook->is_authenticated()) : ?>

        <div class="mt-3">
        	<h6>You must have a connected facebook account</h6><br>
        	<img src="<?php echo base_url('assets/image/slide_fb2.png');?>" height="120" width="120"/>
            <a class="btn mt-2 ml-3 p-3" style="background-color:#003E90; color:#fff;" href="<?php echo $this->facebook->login_url(); ?>">Login with facebook</a>
        </div>
        
        	<br><h6>On successfull connection, you can Like someones post and get Rewards(credits).</h6>
        <hr><?php die;?>

    <?php else :
		
	?>
    	
        <div class="w-50 rounded" style="border:2px solid gray; padding:10px;">
    	<div class="row no-gutters">
    		<div class="col-lg-5  col-md-5 col-sm-12 col-12"><img src="<?php echo $social_fb['picture']; ?>" class="rounded" height="150" width="150"></div>
    		
    		
    		<div class="col-lg-7 col-md-7 col-sm-12 col-12">
			<font class="lead">Name : <?php echo $social_fb['name']; ?></font><br><br>
		        <i class="fa fa-circle text-success"><font class="lead">&emsp;Active Now</font></i><br><br>
		        <a href="<?php echo site_url('Facebook_data/fb_logout'); ?>"  class="btn btn-primary">Logout</a>
    		</div>
    	</div>
    </div>
        
    
    	<hr>
    
    	
        
    <?php	
		endif;
		
		if(empty($fb_pages))
		{
			  echo "<h1>No More Pages Available</h1>";die;
		}
	
	
	$user_post=$fb_pages['url'];
	$user=$fb_pages['uid'];
	$cpc=$fb_pages['cpc'];
	$post=$fb_pages['post_id'];
	
	$s_id=$fb_pages['social_data_id'];

	?>
</div>
    <h1>Facebook Page</h1>
    <div class="fb_btn btn-primary">
    	
        <a data-url="<?php echo $user_post; ?>" onClick="fb_page(this)" target="_blank">Like Page</a>
    </div>
   
   
   <script>
function fb_page(thisObj){
	
	var url = $(thisObj).data('url')
	var win = window.open(url,"_blank","height=600,width=800");
	//alert(url);
	setTimeout(function () { 
		win.close();
		$.ajax({
			data:{
				url:url,
				page_type:'fb_page',
				s_id:'<?php echo $s_id; ?>'	
				},
				
			type:"POST",
			url:"<?php echo site_url('facebook_data/get_ajax_callback');?>",
			success: function(response){
				console.log(response);
				if(response=="yes")
				{	alert('Congratulations, You Got 1 More Slot');
					ajax_insert();
				}
				else if(response=="no"){
					alert('You Not Like Page');
					window.location.reload();
				}  
			}
		});
	}, 20000);
}
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