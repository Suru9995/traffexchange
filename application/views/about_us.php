<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - traffExchange</title>



<?php $this->load->view('master/master_links');
	$this->load->view('master_logo_menu');
 ?>



</head>
<body>

<?php
	$this->load->view('master/scrolltotop');
?>
<div class="contact_main about_main">
	<div class="container">
    	<div class="row no-gutters">
        	<div class="col-lg-12">
            
            </div>
        </div>
        <div class="contact_text">
                	<h1>About Us</h1>
                    <p>Like many businesses out there, TraffExchange has a lot of different types of people visiting their website -- and what these people want to contact them about can vary widely. That's why they've decided to go deeper than the one-size-fits-all approach.</p>
            </div>
    </div>
</div>

<div class="reason">
	<div class="container">
    	
        <div class="row no-gutters text-center mt-5 mb-5">
        	<div class="col-lg-4">
            	<img src="<?php echo base_url('assets/image/24hourplumbing.jpg');?>" width="100" height="80"/>
                <h4 class="mt-3">24 HOUR SERVICE</h4>
                <h6 class="mt-3 ml-3 mr-3">We are online 24x7 for you, Anytime, Anywhere.</h6>
            </div>
            
            <div class="col-lg-4">
            	<img src="<?php echo base_url('assets/image/uniqueUser_at.png');?>" width="100" height="80"/>
                 <h4 class="mt-3">UNIQUE USERS</h4>
                <h6 class="mt-3 ml-3 mr-3">We always giving Unique users for Exchanging.</h6>
            </div>
            
            <div class="col-lg-4">
            	<img src="<?php echo base_url('assets/image/highly-secured.png');?>" width="100" height="80"/>
                 <h4 class="mt-3">HIGHLY SECURED</h4>
                <h6 class="mt-3 ml-3 mr-3">We provides security from spamming, And also using bot-free technique.</h6>
            </div>
        </div>
        
    </div>
</div>

<div class="abt_para"  style="background-color:#eee;">
	<div class="container">
    	<div class="row no-gutters pt-5 pb-5">
        	<div class="col-lg-12 col-md-12 pl-5 pr-5">
            	<h2><span class="txt anim-text-flow">What is Traffic Exchange?</span></h2><br>
                <p class="mt-4 text-justify" style="font-size:20px;">&emsp;&emsp;&emsp;&emsp;A traffic exchange website receives website submissions from webmasters that join traffic exchange networks. The person who submitted the website then has to browse other member sites on the exchange program to earn credits, which enable their sites to be viewed by other members through the surf system. This increases the number of visitors to all the sites involved.</p>
            </div>
        </div>
    </div>
</div>


<div class="abt_help">
	<div class="container">
    	
        <div class="row no-gutters pt-5 pb-5">
        	<div class="col-lg-6 col-md-6 col-sm-12 col-12">
            	<img src="<?php echo base_url('assets/image/517169417.png');?>" width="280" height="280" style="box-shadow:-30px 30px 20px 0px rgba(0,0,0,.3);"/>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            	<h3><span class="txt anim-text-flow">HOW CAN WE HELP YOU?</span></h3><br>
                <p class="pr-5 lead text-justify abt_how">TraffExchange is a collection of users who want to make a traffic on their websites on social media for that users want credits, so they view, like, retweet, subscribe, follows other users sites, posts, videos etc. So traffexchange will help you to make a traffic on your website. we also provide facility to grow in social media like facebook, twitter, youtube and instagram.</p>
            </div>
        </div>
        
    </div>
</div>
<?php
	$this->load->view('master/footer_master');
?>


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
</body>
</html>