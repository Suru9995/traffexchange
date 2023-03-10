<html>

<head>
<?php $this->load->view('master/master_links'); ?>

<title>Facebook Post</title>
</head>
<body>
 
 <script>
 
 
	 
 
 


/*
 * Facebook Like Unlike jQuery Plugin
 * Copyright 2013, Jaspreet Chahal
 * Free to use under the MIT license
 * http://www.opensource.org/licenses/mit-license.php
 * http://jaspreetchahal.org
 * Donate: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=MHMQ6E37TYW3N
 */
 
jQuery.fn.jcFacebookLike = function (settings) {
    settings = jQuery.extend({
        applicationId: "199123167350627",
        status: true,
        cookie: true,
        send: "false",
        href: window.location.href,
        layout: "standard", // standard | button_count | box_count
        show_faces: "true",
        width: "450",
        font: "lucida grande",
        colorscheme: "light",
        ref: "",
        debug: false,
        callbackLike: function () {
			alert('liked');
        },
        callbackUnLike: function () {
			alert('unliked');
        }
    }, settings)
	
    // place fb-root element on the page as described here https://developers.facebook.com/docs/reference/javascript/#fbroot
    if ((jQuery("#fb-root").length == 0)) {
        jQuery('<div id="fb-root" ></div>').appendTo("body");
    }
	;
    function addAtt(el, att) {
        if ( settings[att].length > 0) {
            return el.setAttribute(att, settings[att]);
        }
    }
    var fbInit = false;
    return this.each(function () {
        $el = jQuery(this);
        // now we will create fb:like element
        var fbLike = document.createElement("fb:like");
        addAtt(fbLike, "status");
        addAtt(fbLike, "send");
        addAtt(fbLike, "href");
        addAtt(fbLike, "layout");
        addAtt(fbLike, "show_faces");
        addAtt(fbLike, "width");
        addAtt(fbLike, "font");
        addAtt(fbLike, "colorscheme");
        addAtt(fbLike, "ref");
        $el.append(fbLike);

    // final thing is to make sure that application ID exists
    if (settings.applicationId.length > 0 ) {
        window.fbAsyncInit = function () {
            FB.init({
                cookie: true,
                xfbml: true,
                appId: settings.applicationId
            });
            FB.Event.subscribe('edge.create', function (response) {
                settings.callbackLike(response);
                if (settings.debug) {
                    console.log(" -- Liked URL -- ");
                    console.log(response);
                }
            });
            FB.Event.subscribe('edge.remove', function (response) {
                settings.callbackUnLike(response);
                if (settings.debug) {
                    console.log(" -- Unliked URL -- ");
                    console.log(response);
                }
            });
        };
        // add all.js
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=135793783198674";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        fbInit = true;
    }
    });
};

</script> 


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=199123167350627&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="fb-like" data-href="https://www.facebook.com/photo.php?fbid=746633055546615&set=a.612736715602917.1073741835.100005997816143&type=3" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>


</body>
</html>



<?php  die; ?>
<head>
<?php die; $this->load->view('master/master_links'); ?>

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
            <a class="btn mt-2 ml-3 p-3" style="background-color:#003E90; color:#fff;" href="<?php echo $this->facebook->login_url(); ?>">Login with facebook</a>
        </div>
        
        	<br><h6>On successfull connection, you can Like someones post and get Rewards(credits).</h6>
        <hr><?php die;?>

    <?php else :
		
	?>
    	<div style="width:40%; border:2px solid gray; padding:10px; height:170px">
        	<div style="float:left;">
            	<img src="<?php echo $social_fb['picture']; ?>" class="rounded" height="150" width="150">
            </div>
            <div  style="float:right; padding-right:15px;">
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
<script>
function fb_post(thisObj){
	var url = $(thisObj).data('url')
	var win = window.open(url,"_blank","height=600,width=800");
	//alert(url);
	setTimeout(function () { 
		win.close();
		$.ajax({
			data:{url:url},
			type:"POST",
			url:"<?php echo site_url('facebook_data/get_ajax_callback');?>",
			success: function(response){
				console.log(response)
			}
		});
	}, 10000);
}
</script>
</html>