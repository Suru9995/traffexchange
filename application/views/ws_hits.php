<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website Hits</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>
<?php
	
	
	$website="";
	$user="";
	$cpc="";
	$post="";
	
	
	if(empty($sites))
	{
		  echo "<h1>No More Sites Available</h1>";die;
	}
	
	
	$website=$sites['url'];
	$user=$sites['uid'];
	$cpc=$sites['cpc'];
	$post=$sites['post_id'];
	
	echo $sites['url'];
	//print_r($sites);
	
?>

<script>
	
	$(document).ready(function(){
	
	function loaded(){
		alert('load');	
	}
	
	$('#frame').on('load',function(){
			$('.loading').fadeOut(500);
			x=20;
			setInterval(function(){ 
								$('.timer').html('Next Website in : '+x+'s');
								
								if(x==0)
								{
									ajax_reload();
								}
								 x-=1;
							}, 1000);
		
		 });
			
		function ajax_reload()
		{
			
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
		
		
			
		
	});
	
	
</script>
	
    
   <h1>Website Hits</h1><div class="timer d-inline float-right">Next Website in : 20s</div>
   
<div style="position:relative;">   
<iframe  id="frame" src="<?php echo $website; ?>" height="480" width="100%">
	<?php echo $website; ?>  <p>Your browser does not support iframes.</p>
</iframe>
</div>
    <div class="loading text-center">
    <img src="<?php echo base_url('assets/image/loading.gif'); ?>" id="img" width="200">
    </div>



 
</body>
</html>