<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>How it works - traffExchange</title>



<?php $this->load->view('master/master_links');
	$this->load->view('master_logo_menu');
 ?>

</head>
<body>
<script>
$(window).scroll(function() {
   
   // text traffexchange
   var hT = $('.im-1').offset().top,
       hH = $('.im-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.img-1').addClass('animated').addClass('bounceInRight');
   }
   
   
   // first content
   var hT = $('.tx-1').offset().top,
       hH = $('.tx-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.txt-1').addClass('animated').addClass('bounceInLeft');
   } else {
	   $('.txt-1').removeClass('animated').removeClass('bounceInLeft');
   }
   
   
   // earn credits
   var hT = $('.hd-2').offset().top,
       hH = $('.hd-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.had-2').addClass('animated').addClass('bounceInLeft');
   } else {
	   $('.had-2').removeClass('animated').removeClass('bounceInLeft');
   }
   
   // earn credit content
   var hT = $('.tx-2').offset().top,
       hH = $('.tx-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.txt-2').addClass('animated').addClass('fadeInLeft');
   } else {
	   $('.txt-2').removeClass('animated').removeClass('fadeInLeft');
   }
   
   // earn credit img
   var hT = $('.im-2').offset().top,
       hH = $('.im-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.img-2').addClass('animated').addClass('bounceInLeft');
   }
   
   // work flow
   var hT = $('.hd-3').offset().top,
       hH = $('.hd-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.had-3').addClass('animated').addClass('flipInY');
   } else {
	   $('.had-3').removeClass('animated').removeClass('flipInY');
   }
   
   // work flow content
   var hT = $('.tx-3').offset().top,
       hH = $('.tx-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.txt-3').addClass('animated').addClass('tada');
   } else {
	   $('.txt-3').removeClass('animated').removeClass('tada');
   }
   
   // work flow content
   var hT = $('.tx-4').offset().top,
       hH = $('.tx-4').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.txt-4').addClass('animated').addClass('bounceInLeft');
   }else {
	   $('.txt-4').removeClass('animated').removeClass('bounceInLeft');
   }
   
   // need help heading
   var hT = $('.hd-4').offset().top,
       hH = $('.hd-4').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.had-4').addClass('animated').addClass('fadeInUp');
   }else {
	   $('.had-4').removeClass('animated').removeClass('fadeInUp');
   }
   
   
   // also read
   var hT = $('.hd-5').offset().top,
       hH = $('.hd-5').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.had-5').addClass('animated').addClass('fadeInUp');
   }else {
	   $('.had-5').removeClass('animated').removeClass('fadeInUp');
   }
   
});
</script>
<?php
	$this->load->view('master/scrolltotop');
?>

<div class="how_main">
	<div class="container">
    	<div class="row no-gutters">
        	<div class="col-lg-12">
            
            </div>
        </div>
        <div class="contact_text">
        
                 	<img id="gif_img" src="<?php echo base_url('assets/image/cute-little-pony-cartoon-reading-book-animation-2.gif');?>" width="200" height="200"/>
        
                	<h1>How it Works?</h1>
                    <p>This page explain about how the Traffic exchange works.</p>
            </div>
            
         <div class="gif">
         	<img src="<?php echo base_url('assets/image/source.gif');?>" width="200" height="200"/>
         </div>
         <div class="gif2">
         <img src="<?php echo base_url('assets/image/source2.gif');?>" width="200" height="200"/>
         </div>
            
    </div>
</div>

<div class="abt_help">
	<div class="container">
    	
        <div class="row no-gutter pb-5">
        
        	<div class="im-1"></div>
        	<div class="img-1 coin_img col-lg-4 col-md-4 col-sm-12 col-12 mt-5">
            	<img src="<?php echo base_url('assets/image/coins.png');?>" width="150" height="150" />
            </div>
            
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 pt-3"><br>
            	<h1 class="animated bounceIn">What is Credits ?</h1><br>
                <div class="tx-1"></div>
                
                <p class="txt-1 pr-5 lead text-justify abt_how">In traffExchange, user needs credits for exchanging traffic with other traffExchange users. User must need enough credits to view or socialize their posts , website , Video. There are two ways to get credits :<br>  <b>i) Free Credits</b><br><b>ii) Buy Credits</b></p>
            </div>
        </div>
        
    </div>
</div>

<div class="abt_help" style="background-color:#EEEEEE;">
	<div class="container">
    	
        <div class="row no-gutters pt-5 pb-5">
        	
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            	<div class="hd-2"></div>
            	<h1 class="had-2">How to earn credits ?</h1><br>
                <div class="tx-2"></div>
                <p class="txt-2 pr-5 lead text-justify abt_how">
                	<big>&rarr;</big> View other user's Website <br>
                    <big>&rarr;</big> View other user's Youtube Video <br>
                    <big>&rarr;</big> Like other user's Posts,Pages on Facebook<br>
                    <big>&rarr;</big> Share other user's Posts,Pages on Facebook<br>
                    <big>&rarr;</big> Like other user's Tweets on Twitter<br>
                    <big>&rarr;</big> Tweet other user's blogs,messages,links on Twitter<br>
                    <big>&rarr;</big> Retweet other user's Tweets on Twitter<br>
                    <big>&rarr;</big> Follow other users on Twitter<br>
                </p>
            </div>
            <div class="im-2">
            <div class="img-2 col-lg-4 col-md-4 col-sm-12 col-12 text-right mt-5 set_img">
            	<img src="<?php echo base_url('assets/image/earn.jpg');?>" width="300" height="300" />
            </div>
            
        </div>
        
    </div>
</div>


<div class="abt_help">
	<div class="container">
    	
        <div class="row no-gutters pt-5">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="hd-3"></div>
            	<h1 align="center" class="had-3">Work flow of exchange</h1><br>
                <div class="tx-3"></div>
                <p class="lead text-center txt-3"><a href="<?php echo site_url('register'); ?>" class="d-inline">Sign Up</a> > <a href="<?php echo site_url('login'); ?>" class="d-inline">Login</a> > Authentication > Exchange !!</p>
                <p class="lead txt-3 text-justify text-center">There are some basic steps you need to learn for exchange easily.<br><br>
					
                    <div class="tx-4"></div>
                	<p class="lead txt-4 text-justify pl-5 text_step">
                    <b>Step 1 :</b> Register your account. On successful registration, You'll get <b><big>50</big></b> credits free as welcome bonus.<br>
                    <b>Step 2 :</b> Login with correct email and password.<br>
                    <b>Step 3 :</b> Add Url of your post/website/page/video according to page type you want to add. make sure that you have enough credits because You can add post but your post not visible if you have not Sufficient balance.<br>
                    <b>Step 4 :</b> Earn credits as above describe way.<br>
                    <b>Step 5 :</b> Enjoy ! your url is now visible to other users.
                    
                    </p>
                
                
                
                
                </p>
            </div>
        </div>
        
    </div>
</div>

<div class="abt_help">
	<div class="container">
    	
        <div class="row no-gutters pt-5 pb-5">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
            	<div class="hd-4"></div>
            	<h1 align="center" class="had-4">Need Help?</h1><br>
            </div>
            
            <div class="hd-5"></div>
            <div class="col-lg-12 had-5 col-md-12 col-sm-12 col-12 pl-5 text_step">
	            <p class="lead"><a href="<?php echo site_url('how-to-copy-url'); ?>">How to copy URL ?</a></p>
                <p class="lead"><a href="<?php echo site_url('facebook');?>">How to grow your Facebook account?</a></p>
                <p class="lead"><a href="<?php echo site_url('twitter');?>">How to grow your Twitter account?</a></p>
                <p class="lead"><a href="<?php echo site_url('youtube');?>">How to grow your Youtube channel?</a></p>
                <p class="lead"><a href="<?php echo site_url('website');?>">How to get more Website traffic?</a></p>
            </div>
        </div>
        
    </div>
</div>

<?php
	$this->load->view('master/footer_master');
?>
</body>
</html>