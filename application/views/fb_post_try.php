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
    	<div style="width:40%; border:2px solid gray; padding:10px; height:170px">
        	<div style="float:left;">
            	<img src="<?php echo $social_fb['picture']; ?>" class="rounded" height="150" width="150">
            </div>
            <div style="float:right; padding-right:15px;">
            	<font class="lead">Name : <?php echo $social_fb['name']; ?></font><br><br>
                <i class="fa fa-circle text-success"><font class="lead">&emsp;Active Now</font></i><br><br>
                <a href="<?php echo site_url('Facebook_data/fb_logout'); ?>"  class="btn btn-primary">Logout</a>
                
            </div>
        </div><hr><div style="clear:both"></div>
    	
    <?php	
		endif;	
		if(empty($fb_posts))
		{
			  echo "<h1>No More Post Available</h1>";die;
		}
	
	$user_post=$fb_posts['url'];
	$user=$fb_posts['uid'];
	$cpc=$fb_posts['cpc'];
	$post=$fb_posts['post_id'];
	?>
</div>
    <h1>Facebook Post</h1>
    <div class="fb_btn btn-primary">
    	
        <a data-url="<?php echo $user_post; ?>" onClick="fb_post(this)" target="_blank">Like Post</a>
    </div>
    
    
</body>
<!--<script>
function fb_post(thisObj){
	var url = $(thisObj).data('url')
	var win = window.open(url,"_blank","height=600,width=800");
	//alert(url);
	setTimeout(function () { 
		win.close();
		$.ajax({
			data:{url:url},
			type:"POST",
			url:"<?php //echo site_url('facebook_data/get_ajax_callback');?>",
			success: function(response){
				console.log(response)
			}
		});
	}, 10000);
}
</script> -->


<div id="fb-root"></div>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '199123167350627',
      xfbml      : true,
      status     : true,
      cookie     : true,
      oauth      : true,
      version    : 'v2.0'
    });
		
  };


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     //js.src = "//connect.facebook.net/en_US/sdk/debug.js";
	 js.src = "https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12";
	  
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
    

/*
window.fbAsyncInit = function() {   
   FB.api(
    "/{2059057471047216}/likes",
    function (response) {
      if (response && !response.error) {
        /* handle the result 
		alert('like');
      }
    }
);

};
*/

window.fbAsyncInit = function() {
FB.Event.subscribe('edge.create', function(trackUrl){
    _gaq.push(['_trackSocial', 'facebook', 'like', trackUrl]);
});
};

/*
window.fbAsyncInit = function() {
FB.api(2083115945308035+"/likes/"+2059057471047216, function(response) {
	
		alert(JSON.stringify(response));
		
		if ( response ) { //there should only be a single value inside "data"
			alert('You like it');
		} else {
			alert("You don't like it");
		}
	});
};


  /* 
  window.fbAsyncInit = function() {
   
   FB.api({
    method:     "pages.isFan",
    page_id:        my_page_id,
	},  function(response) {
        console.log(response);
        if(response){
            alert('You Likey');
        } else {
            alert('You not Likey :(');
        }
    }
	
	);
  };
*/


</script>
 
<?php echo $user_post; ?>
<div class="fb-post" data-href=<?php echo $user_post; ?>></div>

<br><br><br>


















<!--
 <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : 'YOUR_APP_ID', // App ID
          channelUrl : 'http(s)://YOUR_APP_DOMAIN/channel.html', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });

        FB.getLoginStatus(function(response) {
          var page_id = "YOUR_PAGE_ID";
          if (response && response.authResponse) {
            var user_id = response.authResponse.userID;
            var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
            FB.Data.query(fql_query).wait(function(rows) {
              if (rows.length == 1 && rows[0].uid == user_id) {
                console.log("LIKE");
                $('#container_like').show();
              } else {
                console.log("NO LIKEY");
                $('#container_notlike').show();
              }
            });
          } else {
            FB.login(function(response) {
              if (response && response.authResponse) {
                var user_id = response.authResponse.userID;
                var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
                FB.Data.query(fql_query).wait(function(rows) {
                  if (rows.length == 1 && rows[0].uid == user_id) {
                    console.log("LIKE");
                    $('#container_like').show();
                  } else {
                    console.log("NO LIKEY");
                    $('#container_notlike').show();
                  }
                });
              } else {
                console.log("NO LIKEY");
                $('#container_notlike').show();
              }
            }, {scope: 'user_likes'});
          }
        });
      };

      // Load the SDK Asynchronously
      (function(d){
        var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        d.getElementsByTagName('head')[0].appendChild(js);
      }(document));
    </script>



    <div id="container_notlike">
      YOU DON'T LIKE ME :(
    </div>

    <div id="container_like">
      YOU LIKE ME :)
    </div>
-->



</html>