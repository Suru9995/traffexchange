<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>How to get likes , shares on facebook</title>

<?php $this->load->view('master/master_links');
	$this->load->view('master_logo_menu');
?>

<style>
#menu_btn i
{
	color:#555 !important;
}
</style>

</head>
<body>

<?php
	$this->load->view('master/scrolltotop');
?>

<script>
	
$(window).scroll(function() {	
	// also read
   var hT = $('.fb-1').offset().top,
       hH = $('.fb-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.fb-i').addClass('animated').addClass('fadeInLeft');
   }else {
	   $('.fb-i').removeClass('animated').removeClass('fadeInLeft');
   }
	
	
   // fb step
   var hT = $('.fb-2').offset().top,
       hH = $('.fb-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.fb-txt').addClass('animated').addClass('fadeInRight');
   }else {
	   $('.fb-txt').removeClass('animated').removeClass('fadeInRight');
   }
   
   // fb step
   var hT = $('.fb-2').offset().top,
       hH = $('.fb-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.fb-txt').addClass('animated').addClass('fadeInRight');
   }else {
	   $('.fb-txt').removeClass('animated').removeClass('fadeInRight');
   }
   
   // fb post
   var hT = $('.fb-3').offset().top,
       hH = $('.fb-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.fb-post').addClass('animated').addClass('fadeInRight');
   }else {
	   $('.fb-post').removeClass('animated').removeClass('fadeInRight');
   }
   
   
   // tw logo
   var hT = $('.tw-1').offset().top,
       hH = $('.tw-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.tw-logo').addClass('animated').addClass('rotateIn');
   }else {
	   $('.tw-logo').removeClass('animated').removeClass('rotateIn');
   }
   
   // tw heading
   var hT = $('.tw-2').offset().top,
       hH = $('.tw-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.tw-hd').addClass('animated').addClass('pulse');
   }else {
	   $('.tw-hd').removeClass('animated').removeClass('pulse');
   }
   
   
   // tw heading
   var hT = $('.tw-3').offset().top,
       hH = $('.tw-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.tw-pr').addClass('animated').addClass('fadeInLeft');
   }else {
	   $('.tw-pr').removeClass('animated').removeClass('fadeInLeft');
   }
   
   // tw heading
   var hT = $('.tw-4').offset().top,
       hH = $('.tw-4').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.tw-tw').addClass('animated').addClass('fadeInRight');
   }else {
	   $('.tw-tw').removeClass('animated').removeClass('fadeInRight');
   }
   
   
   // web logo
   var hT = $('.wb-1').offset().top,
       hH = $('.wb-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.wb-logo').addClass('animated').addClass('rotateIn');
   }else {
	   $('.wb-logo').removeClass('animated').removeClass('rotateIn');
   }
   
   // tw heading
   var hT = $('.wb-2').offset().top,
       hH = $('.wb-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.wb-hd').addClass('animated').addClass('pulse');
   }else {
	   $('.wb-hd').removeClass('animated').removeClass('pulse');
   }
   	
	
	// wb url
   var hT = $('.wb-3').offset().top,
       hH = $('.wb-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.wb-url').addClass('animated').addClass('fadeInLeft');
   }else {
	   $('.wb-url').removeClass('animated').removeClass('fadeInLeft');
   }
   
   
   
    // yt logo
   var hT = $('.yt-1').offset().top,
       hH = $('.yt-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.yt-logo').addClass('animated').addClass('rotateIn');
   }else {
	   $('.yt-logo').removeClass('animated').removeClass('rotateIn');
   }
   
   // yt heading
   var hT = $('.yt-2').offset().top,
       hH = $('.yt-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.yt-hd').addClass('animated').addClass('pulse');
   }else {
	   $('.yt-hd').removeClass('animated').removeClass('pulse');
   }
   	
	
	// yt url
   var hT = $('.yt-3').offset().top,
       hH = $('.yt-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.yt-url').addClass('animated').addClass('fadeInRight');
   }else {
	   $('.yt-url').removeClass('animated').removeClass('fadeInRight');
   }
	
	
	 // li logo
   var hT = $('.li-1').offset().top,
       hH = $('.li-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.li-logo').addClass('animated').addClass('rotateIn');
   }else {
	   $('.li-logo').removeClass('animated').removeClass('rotateIn');
   }
   
   // li heading
   var hT = $('.li-2').offset().top,
       hH = $('.li-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.li-hd').addClass('animated').addClass('pulse');
   }else {
	   $('.li-hd').removeClass('animated').removeClass('pulse');
   }
   	
	
	// li url
   var hT = $('.li-3').offset().top,
       hH = $('.li-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.li-url').addClass('animated').addClass('fadeInLeft');
   }else {
	   $('.li-url').removeClass('animated').removeClass('fadeInLeft');
   }
		
});
</script>

<div class="mt-5 pt-5"></div>

<div class="container">
	<div class="row no-gutters">
    	<div class="col-lg-12 text-center">
        	<h1 class="animated swing">How to copy URL</h1><hr class="animated fadeInRight border border-dark"><br>
            <p class="lead text-justify animated fadeInLeft">&emsp;&emsp; While, User add their posts/sites in <strong>TraffExchange</strong>, They need to copy URL. So, this content is show how to copy URL from different social medias. Make sure to copy URL from social sites because it visible to other TraffExchange users. So, if you copied wrong URL, then it'll not visible to other users.</p>
        </div>
    </div>
    <br>
    
    <div class="row no-gutters">
    	<div style="background-color:#eceff1" class="col-lg-12 p-3 row no-gutters text-center">
        	
            <div class="col-lg-3 col-md-2"></div>
            
            <div class="animated rotateIn col-lg-2 col-md-3 col-sm-12 col-12"><img src="<?php echo base_url('assets/image/slide_fb2.png');?>" width="60"  /></div>
            <div class="col-lg-7 col-md-7 animated pulse col-sm-12 col-12 text-left copy_fb"> <h3 class="mt-2">Copy URL from Facebook</h3></div>

            
        </div>
    </div>
    
    
    <div class="row no-gutters">
    
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of Facebook Page ?</h4>
        </div>
        <div class="fb-2"></div>
        <div class="fb-1"></div>
        <div class="fb-i col-lg-6 col-md-6 col-sm-12 col-12 pt-3 fb_url">
        	<img src="<?php echo base_url('assets/image/fb_page_url.png');?>" width="80%"/>
        </div>
        
        <div class="fb-txt col-lg-6 col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open Facebook. <br>
            <strong>Step 2 : </strong> Search the page you want to add. OR go to Profile -> My pages.  <br>
            <strong>Step 3 : </strong> Copy URL from Address bar as shown in image. <br>
            <strong>Step 4 : </strong> Paste URL into add page/site form. <br>
        
        </div>
        
    </div>
    
    <hr>
    
    <div class="row no-gutters">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of Facebook Post ?</h4>
        </div>
        
      	<div class="fb-3"></div>
        <div class="fb-post col-lg-6 col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open Facebook. <br>
            <strong>Step 2 : </strong> Search the Post you want to add.<br>
            <strong>Step 3 : </strong> Click on that post.<br>
            <strong>Step 4 : </strong> Copy URL from Address bar as shown in image. <br>
            <strong>Step 5 : </strong> Paste URL into add page/site form. <br>
        
        </div>
          <div class="fb-post col-lg-6 col-md-6 col-sm-12 col-12 pt-3">
        	<img src="<?php echo base_url('assets/image/fb_share2.png');?>" width="100%"/>
        </div>
        
    </div>
    <hr>
    
    <div class="row no-gutters">
    	<div style="background-color:#eceff1" class="col-lg-12 p-3 row no-gutters text-center">
        	
            <div class="tw-1 col-lg-3 col-md-2"></div>
            <div class="tw-logo col-lg-2 col-md-3 col-sm-12 col-12"><img src="<?php echo base_url('assets/image/slide_tw2.png');?>" width="60"  /></div>
            <div class="col-lg-7 col-md-7 tw-2 col-sm-12 col-12 text-left copy_fb"> <h3 class="mt-2 tw-hd">Copy URL from Twitter</h3></div>

            
        </div>
    </div>
    
    <div class="row no-gutters">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of Twitter Profile ?</h4>
        </div>
        <div class="tw-3"></div>
        <div class="tw-pr col-lg-6 col-md-6 col-sm-12 col-12 pt-3 fb_url">
        	<img src="<?php echo base_url('assets/image/tw_profile.png');?>" width="80%"/>
        </div>
        <div class="tw-pr col-lg-6 col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open Twitter. <br>
            <strong>Step 2 : </strong> Click on your Profile. <br>
            <strong>Step 3 : </strong> Copy URL from Address bar as shown in image. <br>
            <strong>Step 4 : </strong> Paste URL into add page/site form. <br>
        
        </div>
        
    </div>

	<hr>
    
    <div class="row no-gutters">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of Twitter Tweet ?</h4>
        </div>
        
      	<div class="tw-4"></div>
        <div class="tw-tw col-lg-6 col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open Twitter. <br>
            <strong>Step 2 : </strong> Search the tweet you want to add.<br>
            <strong>Step 3 : </strong> Click on dropdown arrow at top-right of the tweet.<br>
            <strong>Step 4 : </strong> Select <strong>"Copy link to Tweet"</strong>.<br>
            <strong>Step 5 : </strong> Paste URL into add page/site form. <br>
        
        </div>
          <div class="tw-tw col-lg-6 col-md-6 col-sm-12 col-12 pt-3">
        	<img src="<?php echo base_url('assets/image/tw_tweet.png');?>" width="100%"/>
        </div>
        
    </div>
<hr>

	<div class="row no-gutters">
    	<div style="background-color:#eceff1" class="col-lg-12 p-3 row no-gutters text-center">
        	
            <div class="col-lg-3 col-md-2 wb-1"></div>
            <div class="wb-logo col-lg-2 col-md-3 col-sm-12 col-12"><img src="<?php echo base_url('assets/image/ws_logo.png');?>" width="60"  /></div>
            <div class="col-lg-7 col-md-7 wb-2 col-sm-12 col-12 text-left copy_fb"> <h3 class="mt-2 wb-hd">Copy URL of Website</h3></div>

            
        </div>
    </div>

    <div class="row no-gutters">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of any Website ?</h4>
        </div>
        
        <div class="wb-3"></div>
        <div class="col-lg-6 wb-url col-md-6 col-sm-12 col-12 pt-3 fb_url">
        	<img src="<?php echo base_url('assets/image/ws_url.png');?>" width="80%"/>
        </div>
        <div class="col-lg-6 wb-url col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open any Website. <br>
            <strong>Step 2 : </strong> Copy URL from Address bar as shown in image. <br>
            <strong>Step 3 : </strong> Paste URL into add page/site form. <br>
        
        	<div class="alert alert-danger mt-4 p-3 " role="alert">
            <h4 class="alert-heading">Note</h4><hr>
            <p>Only <strong>http://</strong> sites allowed. It will not allowed <strong>https://</strong> websites. </p>
           
            </div>
        
        </div>
        
    </div>
   <hr>
   
   <div class="row no-gutters">
    	<div style="background-color:#eceff1" class="col-lg-12 p-3 row no-gutters text-center">	
            <div class="col-lg-3 col-md-2 yt-1"></div>
            <div class="col-lg-2 col-md-3 col-sm-12 col-12 yt-logo"><img src="<?php echo base_url('assets/image/slide_yt2.png');?>" width="60"  /></div>
            
            <div class="yt-2 col-lg-7 col-md-7  col-sm-12 col-12 text-left copy_fb"> <h3 class="mt-2 yt-hd">Copy URL of Youtube Video</h3></div>

            
        </div>
    </div>
    
 <div class="row no-gutters">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of Twitter Tweet ?</h4>
        </div>
        
      	<div class="yt-3"></div>
        <div class="col-lg-6 yt-url col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open Youtube. <br>
            <strong>Step 2 : </strong> Search the Video you want to add.<br>
            <strong>Step 3 : </strong> Copy URL from Address bar as shown in image. <br>
            <strong>Step 4 : </strong> Paste URL into add page/site form. <br>
        
        </div>
          <div class="yt-url col-lg-6 col-md-6 col-sm-12 col-12 pt-3">
        	<img src="<?php echo base_url('assets/image/yt_url.png');?>" width="100%"/>
        </div>
        
    </div>
	
    <hr>    
    
    
   <div class="row no-gutters">
    	<div style="background-color:#eceff1" class="col-lg-12 p-3 row no-gutters text-center">
        	<div class="col-lg-3 col-md-2 li-1"></div>
            <div class="col-lg-2 col-md-3 col-sm-12 col-12 li-logo"><img src="<?php echo base_url('assets/image/Linkedin_logo.png');?>" width="60"  /></div>
            <div class="col-lg-7 col-md-7  col-sm-12 col-12 text-left copy_fb li-2"> <h3 class="mt-2 li-hd">Copy URL from Linkedin</h3></div>

            
        </div>
    </div> 
	
   <div class="row no-gutters">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
        	<h4>How to copy URL of Linkedin Company Page ?</h4>
        </div>
        <div class="li-3"></div>
        <div class="li-url col-lg-6 col-md-6 col-sm-12 col-12 pt-3 fb_url">
        	<img src="<?php echo base_url('assets/image/how_linkedin.png');?>" width="80%"/>
        </div>
        <div class="li-url col-lg-6 col-md-6 col-sm-12 col-12 pt-3 lead">
        
        	<strong>Step 1 : </strong> Open Linkedin. <br>
            <strong>Step 2 : </strong> Search company name you want add. <br>
            <strong>Step 3 : </strong> Right click on Company Profile. <br>
  	      	<strong>Step 4 : </strong> <strong>"Click Copy link address"</strong>. <br>
            <strong>Step 5 : </strong> Now URL copied and paste in <strong>Add site/post</strong> Page. <br>
        	
        
        </div>
        
    </div>
     
    
</div>



<div class="abt_help">
	<div class="container">
    	
        <div class="row no-gutters pt-5 pb-5">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
            	<h1 align="center">Also Read</h1>
                <hr style="border:1px solid #394C60; margin-bottom:30px;">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 pl-5 text_step">
                <p class="lead"><a href="<?php echo site_url('facebook');?>">How to grow your Facebook account?</a></p>
                <p class="lead"><a href="<?php echo site_url('twitter');?>">How to grow your Twitter account?</a></p>
                <p class="lead"><a href="<?php echo site_url('youtube');?>">How to grow your Youtube channel?</a></p>
                <p class="lead"><a href="<?php echo site_url('website');?>">How to get more Website traffic?</a></p>
                <p class="lead"><a href="<?php echo site_url('linkedin');?>">How to grow your Linkedin account?</a></p>
            </div>
        </div>
        
    </div>
</div>
<?php
	$this->load->view('master/footer_master');
?>
</body>
</html>