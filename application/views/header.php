<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TraffExchange</title>
<!--<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" rel="stylesheet">

<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" type="text/css" rel="stylesheet">

<link href="<?php echo base_url('assets/css/header.css');?>" type="text/css" rel="stylesheet">

<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>-->

<link href="../../assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<link href="../../assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="../../assets/css/header.css" type="text/css" rel="stylesheet">
<link href="../../assets/css/owl.carousel.min.css" type="text/css" rel="stylesheet">
<link href="../../assets/css/owl.theme.default.min.css" type="text/css" rel="stylesheet">

<script src="../../assets/js/jquery-3.2.1.min.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(e) {
		
		$('.fa-times').hide();
		
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    items:1,
	mouseDrag:false,
	autoplay:true,
	autoplayTimeout:3000,
	navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
})

	$('#menu_btn').click(function(){
		$('#menu').slideToggle();
		$('.fa-bars').toggle();
		$('.fa-times').toggle();
		});


    });
</script>


<script>
// User Scrolling Animation
/*
$(document).ready(function(e) {
	window.onscroll = function(){ animatescroll() };	    
});

*/
</script>



</head>
<body>

<div class="header">
	
    	<div class="row no-gutters">
        	<div class="col-lg-12">
            	<div class="owl-carousel owl-theme">
                    <div class="item"><img src="../../assets/image/background/fb_background.png" height="500"/></div>
                    
                    <div class="item"><img src="../../assets/image/background/tw_background.jpg" height="500"/></div>
                    
                    <div class="item"><img src="../../assets/image/background/yt_background.jpg" height="500"/></div>
                    
                    <div class="item"><img src="../../assets/image/background/ws_background.jpg" height="500"/></div>
                    
                    
                    
                </div>
                <div class="menu" id="menu">
                	<ul>
                    	<li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">How it works ?</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                    </ul>    	
                </div>
                <div class="logo">
                	<img src="../../assets/image/logo.png" width="150"/>
                </div>
                
                <div class="menu_btn" id="menu_btn">
                	<i class="fa fa-bars"></i>
                    <i class="fa fa-times"></i>
                </div>
                
                
            </div>
            
        </div>

</div>

</body>
</html>