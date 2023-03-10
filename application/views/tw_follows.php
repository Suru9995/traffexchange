<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php $this->load->view('master/user_master'); 
	
    $user_post="";
	$user="";
	$cpc="";
	$post="";
    ?>
 
   <?php if(!@$this->session->userdata('tw_user')){ ?>

	
        <div class="mt-3">
        	<h6>You must have a connected Twitter account</h6><br>
        	<img src="<?php echo base_url('assets/image/slide_tw2.png');?>" height="120" width="120" style="border-radius:12px;"/>
            <a class="btn mt-2 ml-3 p-3" style="background-color:#50ABF1; color:#fff;" href="<?php echo site_url('twitter_data/tw_login');?>">Login with Twitter</a>
        </div>
        
        	<br><h6>On successfull connection, you can Like someones twitts and get Rewards(credits).</h6>
        <hr><?php die;?>

    <?php } else {?>
    	
       <div class="w-50 rounded" style="border:2px solid gray; padding:10px;">
    	<div class="row no-gutters">
    		<div class="col-lg-5  col-md-5 col-sm-12 col-12"><img src="<?php echo $social_tw['picture']; ?>" class="rounded" height="150" width="150"></div>
    		
    		
    		<div class="col-lg-7 col-md-7 col-sm-12 col-12">
			<font class="lead">Name : <?php echo $social_tw['name']; ?></font><br><br>
		        <i class="fa fa-circle text-success"><font class="lead">&emsp;Active Now</font></i><br><br>
		        <a href="<?php echo site_url('Twitter_data/tw_logout');?>"  class="btn btn-primary">Logout</a>
    		</div>
    	</div>
    </div>
    
    	<hr>
   
    <?php }?>
    <?php
	
		if(empty($tw_follows))
		{
			echo "<h1>No More Post Available</h1>";die;
		}
		
		$url=@$tw_follows['url'];
		$user=@$tw_follows['uid'];
		$cpc=@$tw_follows['cpc'];
		$post=@$tw_follows['post_id'];
    	$tw_id=$social_tw['social_id'];
		//$url="https://twitter.com/TechnicalGuruji";	//$url="https://twitter.com/TechnicalGuruji/status/968048279127814145?ref_src=twsrc%5Etfw";
		
		//$s_name=substr($url,20);
		//$tw_id = strstr(substr(strstr($url,'status/'),7),'?',true);
		
	?>
    
     <h1>Twitter Follows</h1>
     <p>You must have to wait for window closed automatically after clicked <b>Follows</b> button</p>
     <a class="btn btn-outline-primary" data-url="<?php echo $url; ?>" onClick="tw_follows(this)" target="_blank">Follows</a>
     
     

<script>
function tw_follows(thisObj){	
	var url = $(thisObj).data('url')
	var win = window.open(url,"_blank","height=600,width=800");
	//alert(url);
	setTimeout(function () { 
		win.close();
		$.ajax({
			data:{
				url:url,
				page_type:'tw_likes',
				tw_id:'<?php echo $tw_id; ?>',
			},
			type:"POST",
			url:"<?php echo site_url('twitter_data/get_ajax_callback_follows');?>",
			success: function(response){
				//console.log(response);
				if(response == 1) {
					ajax_insert();	
				} else {
					alert('Not Follow');	
				}
				
			}
		});
	}, 15000);
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
<br>
<br>
<br>
     
</body>
</html>
