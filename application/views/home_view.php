<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TraffExchange</title>

<?php $this->load->view('master/master_links'); ?>
<style>
	.vs{ visibility:hidden; }
</style>	


</head>
<body>

<script>

$(window).scroll(function() {
   
   // text traffexchange
   var hT = $('.sc-1').offset().top,
       hH = $('.sc-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   $('.an-b').hide();
	   
   if (wS > (hT+hH-wH)){
	   $('.an-b').show();
	   $('.an-b').addClass('animated').addClass('bounceInRight');
   }
   
   // Login btn animation
   var hT = $('.sc-login').offset().top,
       hH = $('.sc-login').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   $('.an-b1').hide();
	   
   if (wS > (hT+hH-wH)){
	   $('.an-b1').show();
	   $('.an-b1').addClass('animated').addClass('bounceInRight');
   }
   
   // Reg button animation
   var hT = $('.sc-reg').offset().top,
       hH = $('.sc-reg').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   $('.an-b2').hide();
	   
   if (wS > (hT+hH-wH)){
	   $('.an-b2').show();
	   $('.an-b2').addClass('animated').addClass('bounceInRight');
   }
   
   // instant like section
   
   var hT = $('.scroll-to').offset().top,
       hH = $('.scroll-to').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   $('.ash').hide();
	   
   if (wS > (hT+hH-wH+40)){
	   $('.ash').show();
	   $('.ash').addClass('animated');
	   $('.ash').addClass('bounceIn');
   }
   
   // menu 1
   var hT = $('.mn-1').offset().top,
       hH = $('.mn-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.ash2').addClass('animated');
	   $('.ash2').addClass('rollIn');
   }
   
   // menu 2
   
   var hT = $('.mn-2').offset().top,
       hH = $('.mn-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.ash3').addClass('animated');
	   $('.ash3').addClass('rollIn');
   }
   
   // menu 3
   
   var hT = $('.mn-3').offset().top,
       hH = $('.mn-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	  // $('.ash4').hide();
   if (wS > (hT+hH-wH)){
	   $('.ash4').show();
	   $('.ash4').addClass('animated');
	   $('.ash4').addClass('rollIn');
   } 
   
   
   // bottom menu 1
   var hT = $('.ml-1').offset().top,
       hH = $('.ml-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	 
   if (wS > (hT+hH-wH)){
	   $('.an-1').removeClass('vs');
	   $('.an-1').addClass('animated');
	   $('.an-1').addClass('fadeInLeft');
   } else {
	   $('.an-1').removeClass('animated');
	   $('.an-1').removeClass('fadeInLeft');
   }
   
   // bt menu 2
   
   var hT = $('.ml-2').offset().top,
       hH = $('.ml-2').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.an-2').removeClass('vs');
	   $('.an-2').addClass('animated');
	   $('.an-2').addClass('fadeInLeft');
   } else {
	   $('.an-2').removeClass('animated');
	   $('.an-2').removeClass('fadeInLeft');
   }
   
   // bt menu 3
   
   var hT = $('.ml-3').offset().top,
       hH = $('.ml-3').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	
   if (wS > (hT+hH-wH)){
	   $('.an-3').removeClass('vs');
	   $('.an-3').addClass('animated');
	   $('.an-3').addClass('fadeInLeft');
   } else {
	   $('.an-3').removeClass('animated');
	   $('.an-3').removeClass('fadeInLeft');
   }
   
   // bt menu 4
   
   var hT = $('.ml-4').offset().top,
       hH = $('.ml-4').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	
   if (wS > (hT+hH-wH)){
	   $('.an-4').removeClass('vs');
	   $('.an-4').addClass('animated');
	   $('.an-4').addClass('fadeInLeft');
   } else {
	   $('.an-4').removeClass('animated');
	   $('.an-4').removeClass('fadeInLeft');
   }
   
   // mega menu
   
   var hT = $('.mega-1').offset().top,
       hH = $('.mega-1').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
	   
   if (wS > (hT+hH-wH)){
	   $('.an-mega').removeClass('vs');
	   $('.an-mega').addClass('animated');
	   $('.an-mega').addClass('fadeInLeft');
   } else{
	   $('.an-mega').removeClass('animated');
	   $('.an-mega').removeClass('fadeInLeft');
   }
   
});

</script>

<?php
	$this->load->view('master/scrolltotop');
?>

<div class="header">
	
    	<div class="row no-gutters">
        	<div class="col-lg-12">
            	<div class="owl-carousel1 owl-carousel owl-theme" style="height:500px !important;">
                    
                    <div class="item"><img src="<?php echo base_url('assets/image/background/ws_background.jpg'); ?>" height="500"/>
                    	<div class="slide_logo">
                        	<img src="<?php echo base_url('assets/image/slide_ws.png'); ?>"/>
                        </div>
                        <div class="slide_header">
                        	<font>Website Hits</font>
                            <p>A website is a collection of related web pages, including multimedia content, typically identified with a common domain name, and published on at least one web server. A website may be accessible via a public Internet Protocol (IP) network, such as the Internet, or a private local area network (LAN), by referencing a uniform resource locator (URL) that identifies the site.</p>
                        </div>
                    </div>
                    
                    <div class="item"><img src="<?php echo base_url('assets/image/background/fb_background.png'); ?>" height="500"/>
                    
                    	<div class="slide_logo">
                        	<img src="<?php echo base_url('assets/image/slide_fb.png'); ?>"/>
                        </div>
                        <div class="slide_header">
                        	<font>Facebook</font>
                            
                            <p>Facebook is a social networking website intended to connect friends, family, and business associates. It is the largest of the networking sites, with the runner up being My Space. It began as a college networking website and has expanded to include anyone and everyone.</p>
                            
                        </div>
                    </div>
                    
                    <div class="item"><img src="<?php echo base_url('assets/image/background/tw_background.jpg'); ?>" height="500"/>
                    	<div class="slide_logo">
                        	<img src="<?php echo base_url('assets/image/slide_tw.png'); ?>"/>
                        </div>
                        <div class="slide_header">
                        	<font>Twitter</font>
                            <p>Twitter is an online news and social networking service where users post and interact with messages, called "tweets." These messages were originally restricted to 140 characters, but on November 7, 2017, the limit was doubled to 280 characters for all languages except Japanese, Korean and Chinese.</p>
                        </div>
                    </div>
                    
                    <div class="item"><img src="<?php echo base_url('assets/image/background/yt_background.jpg'); ?>" height="500"/>
                    	<div class="slide_logo">
                        	<img src="<?php echo base_url('assets/image/slide_yt.png'); ?>"/>
                        </div>
                        <div class="slide_header">
                        	<font>Youtube</font>
                            <p>YouTube is an American video-sharing website headquartered in San Bruno, California. The service was created by three former PayPal employees—Chad Hurley, Steve Chen, and Jawed Karim—in February 2005. Google bought the site in November 2006 for US$1.65 billion; YouTube now operates as one of Google's subsidiaries.</p>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                </div>
                
                
                
            </div>
            
        </div>

</div>

<?php $this->load->view('master_logo_menu.php');	?>

<div class="login">
	<div class="container ">
    	<div class="row no-gutters mt-5 mb-5 text-center pl-5 pr-5">

            <div class="col-lg-12">
            	<h2 class="animated rollIn">A FREE TRAFFIC EXCHANGE</h2><br>
                <div class="sc-1"></div>
                <p class="an-b">The best way to get traffic to your website. Increase your rankings using the most trusted auto-surf traffic exchange service on the planet. Also you can increase Likes, Followers, Subscribers, Shares on various social medias like Facebook, Twitter, Instagram, Youtube etc.</p><br><br>
                
                <div class="sc-login"></div>
               <div class="an-b1 col-sm-12 col-12 mb-3 btn_log"><a href="<?php echo site_url('Home/login'); ?>" class="btn_login">Login</a></div> <font>- or -</font> <div class="sc-reg"></div><div class="an-b2 col-sm-12 col-12 mt-3"><a href="<?php echo site_url('Home/register'); ?>" class="btn_reg">Register</a></div>
            </div>
	
        </div>
        <div><br></div>
    </div>
</div>


<div class="scroll-to"></div>
<div class="info pt-5 ash">
	<div class="container">
    
    	<div class="row no-gutters text-center">
        
        <div class="mn-1"></div>
        	<div class="col-lg-4 ash2">
            	<i class="fa fa-thumbs-up"></i><br>
                <h2>Instant Exchange</h2><hr>
                <p>Get instant Exchange per click and exchanges on your statuses, blogs, videos, and other Posts for always free..</p>
            </div>
            
            <div class="mn-2"></div>
            <div class="col-lg-4 ash3">
            	<i class="fa fa-shield"></i><br>
                <h2>Trusted Sites</h2><hr>
                <p>TraffExchange is 100% safe and secure and always will be. We've always being trusted. Thank you for choosing us.</p>
            </div>
            
            <div class="mn-3"></div>
            <div class="col-lg-4 ash4">
            	<i class="fa fa-warning"></i><br>
                <h2>No Spam</h2><hr>
                <p> We make sure that we will never spam. We have online since 2016 and always keep online to help you Provide always free services.</p>
            </div>
            
        </div>
        
    </div>
</div>



<div class="dev">
	<div class="container">
    	<div class="row no-gutters pt-5">
        	<div class="col-lg-12 text-center">
            	<div class="owl-carousel owl-carousel2 owl-theme">
                    <div class="item">
                    	<img src="<?php echo base_url('assets/image/hiren1.jpg');?>" />
                    	<h4><b>Hiren Desai</b></h4>
                        
                        <p>"The greateset performance improvement of all is when a system goes from not-working to working."</p>
                        <i><b>-Developer / Designer</b></i>
                    </div>
                    <div class="item">
                    	<img src="<?php echo base_url('assets/image/anil.jpg');?>" />
                    	<h4><b>Anil Chakrani</b></h4>
                        
                        <p>"The future is here. It is just not evenly distributed yet."</p>
                        <i><b>-Developer / Designer</b></i>
                    </div>
                    <div class="item">
                    	<img src="<?php echo base_url('assets/image/ankit.jpg');?>" />
                    	<h4><b>Ankit Dasukwadiya</b></h4>
                        
                        <p>"The only "intuitive" interface is the nipple. After that it's all learned."</p>
                        <i><b>-Developer / Data Analyst</b></i>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<div class="features pt-5 pb-5">
	<div class="container">
    	<div class="row no-gutters">
        	
            
            <div class="ml-1" style="margin-left:0px !important;"></div>
            <div class="vs an-1 col-lg-2 col-md-2 text-center">
            	
                <i class="fa fa-thumbs-up"></i>
            </div>
            <div class="vs an-1 col-lg-4 col-md-4">
            	<h2>Likes</h2>
                <p>Increase likes on Posts, Photos, Videos, Blogs anywhere,anytime</p>
            </div>
            
            
        	<div class="ml-2" style="margin-left:0px !important;"></div>   
             <div class="vs an-2 col-lg-2 col-md-2 text-center">
            	 <i class="fa fa-user"></i>
            </div>
            <div class="vs an-2 col-lg-4 col-md-4">
            	<h2>Followers</h2>
                <p>Generate Real Followers,Friends on Twitter, Facebook, Youtube, Instagram etc.</p>
            </div>
        </div>
        
        
        
        <div class="row no-gutters">
        	<div class="ml-3" style="margin-left:0px !important;"></div>
            <div class="vs an-3 col-lg-2 col-md-2 text-center">
                <i class="fa fa-plane"></i>
            </div>
            <div class="vs an-3 col-lg-4 col-md-4">
            	<h2>Visitors</h2>
                <p>Increase RealTime Visitors on any website.Visitors will always be unique.</p>
            </div>
        	<div class="ml-4" style="margin-left:0px !important;"></div>
            <div class="vs an-4 col-lg-2 col-md-2 text-center">
                <i class="fa fa-eye"></i>
            </div>
            <div class="vs an-4 col-lg-4 col-md-4">
            	<h2>Viewers</h2>
                <p>Increase Real Viewers on Youtube.It makes help to be on Trending.</p>
            </div>
        </div>
        
    </div>
</div>


<div class="extra pt-5  ">
	<div class="mega-1"></div>
	<div class="container">
    	<div class="row no-gutters ">
        	
        	<div class="an-mega col-lg-12 col-md-12 col-12 col-sm-12 text-center vs">
            	<h1>A TraffExchange Community</h1><br>

                <h4>For more details follow us on social networks</h4><br>
                <h4><i class="fa fa-envelope-o"></i> &nbsp;traffexchange11@gmail.com</h4>
                <h1 style="font-size:50px;"><span class="txt anim-text-flow">ꜜꜜꜜꜜꜜꜜꜜꜜꜜꜜꜜꜜꜜꜜ</span></h1>
            </div>
        </div>
    </div>
</div>

<script>
    	$(document).ready(function(e) {
		$('.txt').html(

			function(i,html) {
			var chars = $.trim(html).split("");
			return '<span>'+chars.join('</span><span>')+'</span>';
			}
		
		);
		          
		  	 
        });
</script>

<?php
	$this->load->view('master/footer_master');
?>
</body>
</html>