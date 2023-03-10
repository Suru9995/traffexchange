<?php
	//print_r($yt_view); die;
$link=@$yt_view['url'];
if(strpos($link,'=') != false)
{
	$url=substr(strstr($link, '='),1);	
}else{
	$url=substr($link,17);
}

?>

<html>
	
    <head>
		<?php $this->load->view('master/master_links'); ?>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Youtube Views</title>
	</head>


  <body>
  
	<?php $this->load->view('master/user_master'); 
		$user="";
		$cpc="";
		$post="";
		
		if(empty($yt_view))
		{
			  echo "<h1>No More Post Available</h1>";die;
		}
	
		$user=$yt_view['uid'];
		$cpc=$yt_view['cpc'];
		$post=$yt_view['post_id'];
		
	?>
    
	<h1>Youtube Views</h1>   
    <p>Video Automatically Stop and Change After 15 second.</p>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>

   	<script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '70%',
          width: '70%',
          videoId: '<?php echo $url; ?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
		//alert('ready');
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 15000);
          done = true;
        }
		
		if (event.data == YT.PlayerState.PAUSED) {
			//alert('You Can not Pause Video');
          	event.target.playVideo();
        }
		
		
      }
      function stopVideo() {
        player.stopVideo();
		ajax_insert();
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