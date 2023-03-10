<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Instagram Likes</title>

<style>
	
</style>

</head>

<body>
<?php $this->load->view('master/user_master'); ?>
	
    <?php if(!@$this->session->userdata('insta')){ ?>
	
    <div class="mt-3">
        	<h6>You must have a connected Instagram account</h6><br>
        	<img src="<?php echo base_url('assets/image/insta_img.png');?>" height="120" width="120"/>
            <a class="btn btn-primary mt-2 ml-3 p-3 fa-insta" style="background-color:#3897F0; color:#fff;" href="https://api.instagram.com/oauth/authorize/?client_id=	2544eb097af441b4ab1e48d957411949&redirect_uri=http://traffexchange.daily-updates.in/index.php/Instagram_data/insta_likes&response_type=code&scope=public_content+likes">Login with Insta</a>
        </div>
        
        	<br><h6>On successfull connection, you can Like someones post and get Rewards(credits).</h6>
        <hr><?php die;?>


    
	<?php } else {?>
    	
        
        <div class="w-50 rounded" style="border:2px solid gray; padding:10px;">
    	<div class="row no-gutters">
    		<div class="col-lg-5  col-md-5 col-sm-12 col-12"><img src="<?php echo $social_insta['picture']; ?>" class="rounded" height="150" width="150"></div>
    		
    		
    		<div class="col-lg-7 col-md-7 col-sm-12 col-12">
			<font class="lead">Name : <?php echo $social_insta['name']; ?></font><br><br>
		        <i class="fa fa-circle text-success"><font class="lead">&emsp;Active Now</font></i><br><br>
		        <a class="btn btn-primary" href="<?php echo site_url('Instagram_data/logout'); ?>">Logout</a>
    		</div>
    	</div>
    </div>
        
    <?php }?>
		<hr>    

	    <h1>Instagram Likes</h1>   
    	
        <div class="btn btn-primary">
        <a data-url="https://www.instagram.com/p/BdpGwg0gcwJ/?taken-by=mr.a_s_h_i_s_h" onClick="insta_post(this)" target="_blank">Like Post</a>
        </div>

        
        
    <!--<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/BdpGwg0gcwJ/" data-instgrm-version="8" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:33.24074074074074% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BdpGwg0gcwJ/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">#royalenfield #smile #birthdaycelebration #minigoa</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by <a href="https://www.instagram.com/mr.a_s_h_i_s_h/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px;" target="_blank">  @ $ l-l ! $ !-!  ️</a> (@mr.a_s_h_i_s_h) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-01-07T08:54:35+00:00">Jan 7, 2018 at 12:54am PST</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script> -->
    
    <script>
	var token = "2202113922.830fa90.c938e24ae004449aae6dc917be4de353";
	var media_id=""; 
	function insta_post(thisObj){
				
		var url = $(thisObj).data('url');
		var win = window.open(url,"_blank","height=600,width=800");
		//alert(url);
		setTimeout(function () { 
			win.close();
			$.ajax({
				type:"GET",
				url:"https://api.instagram.com/oembed/?url="+url,
				
				success: function(response){
					//console.log(response)
					var media_id = response['media_id'];
					//alert(media_id);
					check_like(media_id);				
				}
			});
		}, 6000);
	
	}
	
	
	function check_like(media_id){
		$.ajax({
			type:'GET',
			url:"https://api.instagram.com/v1/media/"+media_id+"/likes?access_token="+token,
			success: function(response){
				console.log(response);
				var len = response['data'].length;
				if(len == 1){
					alert('Like');
				} else {
					alert('Not Like');	
				}
				
			}
		});	
	}
	
	
	</script>
    
</body>
</html>