<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facebook Share</title>
</head>

<body>

<?php $this->load->view('master/user_master'); 

	$user_post="";
	$user="";
	$cpc="";
	$post="";
	//echo $user_post;
	
?>
<div>
	<?php if ( ! $this->facebook->is_authenticated()) : ?>

        <div class="mt-3">
        	<h6>You must have a connected facebook account</h6><br>
        	<img src="<?php echo base_url('assets/image/slide_fb2.png');?>" height="120" width="120"/>
            <a class="btn mt-2 ml-3 p-3" style="background-color:#1C407B; color:#fff;" href="<?php echo $this->facebook->login_url(); ?>">Login with facebook</a>
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
		
		if(empty($fb_shares))
		{
			  echo "<h1>No More Post Available</h1>";die;
		}
	
	$user_post=$fb_shares['url'];
	$user=$fb_shares['uid'];
	$cpc=$fb_shares['cpc'];
	$post=$fb_shares['post_id'];
	
	?>
</div>
    <h1>Facebook Share</h1>
    
    
</body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=<?php echo $app_id; ?>&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
function share(Obj){
	var url  =$(Obj).data('url');
	FB.ui(
	{
	  method: 'feed',
	  link: url,	  
	},
	function(response) {
	  if (response && response.post_id) {
		alert('Post Was Shared.');
		ajax_insert();
	  } else {
		alert('Post Was Not Shared.');	
	  }
	}
	);
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

<input type="button" class="btn btn-outline-primary btn-lg"  onClick="share(this)" value="Share" data-url="<?php echo $user_post; ?>">
</html>
