<html>
<head>
	<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome User</title>

<style>
  	.rate img{
		opacity:0.5;	
	}
	
	
	.rate img:hover{
		opacity:1;	
	}
	
	.rate{
		margin-top:20px;
		margin-bottom:60px;	
	}
    </style>
    <?php
    	if(@$user_rate['rate'] == 1){ ?>
		
     		<style>
				#i1{
					opacity:1;	
				}
			</style>   
        	
	<?php	
		} elseif(@$user_rate['rate'] == 2){	?>
        	<style>
				#i2{
					opacity:1;	
				}
			</style>
    <?php 
		} elseif(@$user_rate['rate'] == 3){	?>
        	<style>
				#i3{
					opacity:1;	
				}
			</style>
    <?php 
		} elseif(@$user_rate['rate'] == 4){	?>
        	<style>
				#i4{
					opacity:1;	
				}
			</style>
    <?php 
		} elseif(@$user_rate['rate'] == 5){	?>
        	<style>
				#i5{
					opacity:1;	
				}
			</style>
    <?php 
		}
	?>    
  

<script>
	
		$(document).ready(function(e) {
           	$('.rating').click(function(){
					var rate=$(this).data('rate');
					
					$.ajax({
						type:'POST',
						data:{
							'rate':rate	
						},
						url:"<?php echo site_url('User/site_rating'); ?>",
						success: function(data){
							$('#res').html(data);
							window.location.reload();
						}
					});
					
			});
        });
	
    </script>
    
</head>

<body>
	<?php $this->load->view('master/user_master'); ?>
    
    <div>
    	<h2>Welcome</h2>
        <h4><?php //date_default_timezone_set("Asia/Kolkata"); echo date('h:i:sa'); ?></h4>
        <hr><br>
</div>
        <div class="container">
        <div class="row  no-gutters pl-5 pr-5 wel">
        	<div class="bor col-lg-3 col-md-4 col-sm-12 col-12" style="border-radius:10px 0 0 10px;"><img src="<?php echo base_url('assets/image/gif-coins.gif');?>" width="100%" style="border-radius:10px;"/></div>
            <div class="bor col-lg-9 col-md-8 col-sm-12 col-12 p-3 lead text-justify text-white" style="background-color:#333; border-radius:0 10px 10px 0;">
		       	 1) After Successful Registeration, User Get <big><strong>50 Coins and 2 Slots</strong></big>. Coins (Credits) is use to add your site/post in TraffExchange. So, your post visible to all other TraffExchange users. while you like / view / share other users posts you earn coins and slots. while other user like / share / view your post which you add in our site your credits debited .
            </div>

        </div>
        <br>
        
        <div class="row  no-gutters pl-5 pr-5 wel">
        	<div class="bor col-lg-3 col-md-4 col-sm-12 col-12" style="border-radius:10px 0 0 10px;"><img src="<?php echo base_url('assets/image/gif-fb.gif');?>" width="100%" style="border-radius:10px;"/></div>
            <div class="bor col-lg-9 col-md-8 col-sm-12 col-12 p-3 lead text-justify text-white" style="background-color:#333; border-radius:0 10px 10px 0;">
		       	 2) You can add facebook page or profile in our website for like and share. If other user successfully like your page or share your profile, then that user will get 1 free website hit via traffexchange means Normal user have only 2 slots for add site/page, but after successfully like or share, the user will get one more slot for adding website/post/page or other links for promote.
            </div>

        </div>
        <br>
        
        <div class="row  no-gutters pl-5 pr-5 wel">
        	<div class="bor col-lg-3 col-md-4 col-sm-12 col-12" style="border-radius:10px 0 0 10px; padding:5px"><img src="<?php echo base_url('assets/image/gif-tw.gif');?>" width="100%" style="border-radius:10px;"/></div>
            <div class="bor col-lg-9 col-md-8 col-sm-12 col-12 p-3 lead text-justify text-white" style="background-color:#333; border-radius:0 10px 10px 0;">
		       	 3) In this step you can earn credits via Like tweet ,follow users, tweet other user URL , Retweet other user tweets in twitter. You First Need to add your Twitter account. after that adding twitter account you able to like,tweet,follow,retweet other user tweet and profile . if you like, tweet, retweet and follow other in twitter via our site you earn credits. also, if other user like, tweet, retweet and follows a profile which you add in TraffExchange your credits will be debited.
            </div>

        </div>
        <br>
        
        <div class="row  no-gutters pl-5 pr-5 wel">
        	<div class="bor col-lg-3 col-md-4 col-sm-12 col-12" style="border-radius:10px 0 0 10px; padding:5px"><img src="<?php echo base_url('assets/image/gif-yt.gif');?>" width="100%" style="border-radius:10px;"/></div>
            <div class="bor col-lg-9 col-md-8 col-sm-12 col-12 p-3 lead text-justify text-white" style="background-color:#333; border-radius:0 10px 10px 0;">
		       	 4) In this step, you can earn credits via view other user's youtube videos. if you watch other user's youtube video which embed in our site, you can earn credits (Note you must see video at least 15 second). you can add your youtube video also. if other users watch your video, your credits will be debited.
            </div>

        </div>
        <br>
        
        <div class="row  no-gutters pl-5 pr-5 wel">
        	<div class="bor col-lg-3 col-md-4 col-sm-12 col-12" style="border-radius:10px 0 0 10px; padding:5px"><img src="<?php echo base_url('assets/image/gif-ws2.gif');?>" width="100%" style="border-radius:10px;"/></div>
            <div class="bor col-lg-9 col-md-8 col-sm-12 col-12 p-3 lead text-justify text-white" style="background-color:#333; border-radius:0 10px 10px 0;">
		       	 5) In this step, you can earn credits via view other user's website. if you see other user's websites you can earn credits. you can also add your website in TraffExchange (Note : only <strong>"http"</strong> sites allowed). if other user view your website your credits will be debited.
            </div>

        </div>
        
        <br>
        
        <div class="row  no-gutters pl-5 pr-5 wel">
        	<div class="bor col-lg-3 col-md-4 col-sm-12 col-12" style="border-radius:10px 0 0 10px;"><img src="<?php echo base_url('assets/image/add-sites.png');?>" width="100%" /></div>
            <div class="bor col-lg-9 col-md-8 col-sm-12 col-12 p-3 lead text-justify text-white" style="background-color:#333; border-radius:0 10px 10px 0;">
		       	 6) You can add your Site/post in TraffExchange. So, You've to just fill some fields.
                 <br><strong><u>Url</u> : </strong>Copy url of post/sites you wants to add.
                 <br><strong><u>Daily Clicks</u> : </strong> Add limit of daily clicks(view / like). Once your post reach daily click limit then it'll not visible during that day.
                 <br><strong><u>Total Clicks</u> : </strong> Add total likes / views you want to get. Once your site/post reach that number then your post will not be visible and may be deleted automatically in TraffExchange. (Note : post will not be deleted from social site, it'll just deleted from Our site, So other user cannot view it).
                 <br><strong><u>CPC</u> : </strong> C.P.C. is number of credits(coins) which you have to give other users who like, view your post. CPC will be deducted from your balance and Credited in other user's account who like, view your post.
                 
            </div>

        </div>
        
        
        </div>
    <div class="container">
    		<h3 class="mt-3">Rate Us : </h3>
        	<div class="rate">
                <img class="rating" title="Bad" id="i1" data-rate=1 src="<?php echo base_url(); ?>/assets/image/emoji1.png">
                <img class="rating" title="not bad" id="i2" data-rate=2 src="<?php echo base_url(); ?>/assets/image/emoji2.png">
                <img class="rating" title="need more change" id="i3" data-rate=3 src="<?php echo base_url(); ?>/assets/image/emoji3.png">
                <img class="rating" title="good" id="i4" data-rate=4 src="<?php echo base_url(); ?>/assets/image/emoji4.png">
                <img class="rating" title="Excellence" id="i5" data-rate=5 src="<?php echo base_url(); ?>/assets/image/emoji5.png"> 	
                <h3 class="mt-3">You Rate : <strong id="res"><?php echo @$user_rate['rate']; ?></strong></h3>
            </div>
    </div>

</body>
</html>