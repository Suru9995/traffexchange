<?php
	$GLOBALS['profile']=$this->User_data_model->get_userdata();
	$GLOBALS['balance']=$this->User_data_model->get_balance();
?>


	<div class="row no-gutters user_head">
    	<div id="hide style-1" class="user_left" style="overflow:auto; z-index:1;">
        	<div class="user_logo">
            	<a href="<?php echo site_url('User'); ?>"><img src="<?php echo base_url('assets/image/logo.png'); ?>" width="200" /></a>
               
            </div>
        	<div class="user_menu">
            	<p><a href="<?php echo site_url('User'); ?>">Home</a></p>
            	<p><a href="<?php echo site_url('User/add_sites'); ?>">Add Site/Page</a></p>
                <p><a href="<?php echo site_url('User/my_sites'); ?>">My Sites</a></p>
                <p><a href="<?php echo site_url('User/buy_credits'); ?>">Buy Credits</a></p>
                
               
                <p><a href="<?php echo site_url('Facebook_data/fb_page'); ?>">Facebook Page</a></p>
                <p><a href="<?php echo site_url('Facebook_data/fb_share'); ?>">Facebook Share</a></p>
                <p><a href="<?php echo site_url('Twitter_data/tw_likes'); ?>">Twitter Likes</a></p>
                <p><a href="<?php echo site_url('Twitter_data/tw_follows'); ?>">Twitter Follows</a></p>
                <p><a href="<?php echo site_url('Twitter_data/tw_tweet'); ?>">Twitter Tweet</a></p>
                <p><a href="<?php echo site_url('Twitter_data/tw_retweet'); ?>">Twitter Retweet</a></p>
                <p><a href="<?php echo site_url('Youtube_data/yt_views'); ?>">Youtube Views</a></p>
                <p><a href="<?php echo site_url('Website_ctrl/ws_hits'); ?>">Website Hits</a></p>
                <p><a href="<?php echo site_url('Linkedin_data/linkedin_post'); ?>">Linkedin Post</a></p>
                <p><a href="<?php echo site_url('Linkedin_data/linkedin_follow'); ?>">Linkedin Follows</a></p>
                <p><a href="<?php echo site_url('Instagram_data/insta_likes'); ?>">Instagram Likes</a></p>
            </div>
            
            <div class="dropdown-divider"></div>
            <div class="user_menu">
            	<p><a href="<?php echo site_url('User/logout'); ?>">Logout</a></p>
            </div>
        </div>
        
        <div class="user_right_hide" id="tog">
        	<div class="row no-gutters">
            	<div class="col-lg-4 col-md-4 col-sm-12 col-12 pt-2">
                	<i class="fa fa-bars" style="font-size:25px"></i>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center lead  pt-2">
                	You Have <?php echo $GLOBALS['balance']['balance']; ?> Credits !
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-right dropdown">
                	<div>
     	               
     	<?php if($this->User_data_model->get_noti_status() >0) { ?>
     
                    <a href="<?php echo site_url('User/notification/1'); ?>" class="d-inline text-danger"><?php echo $this->User_data_model->get_noti_status();?> <i class="fa fa-bell-o" style="font-size:20px; margin-right:10px;"></i></a>
        <?php }else{?>
                    <a href="<?php echo site_url('User/notification'); ?>" class="d-inline text-dark"><i class="fa fa-bell-o" style="font-size:20px; margin-right:10px;"></i></a>
        <?php }?>
                    
                          <button class="btn btn-outline-primary dropdown-toggle drop" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                           <img src="<?php echo base_url('assets/user/image/'.$GLOBALS["profile"]['image']); ?>" width="35" height="35" style="border-radius:50%;"/>  <span style="text-transform:capitalize;"><?php echo $GLOBALS["profile"]['uname']; ?></span>
                          </button>
                          <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo site_url('User/show_profile'); ?>">Profile</a>
                            <a class="dropdown-item" href="<?php echo site_url('User/change_password'); ?>">Change Password</a>
                            <a class="dropdown-item" href="<?php echo site_url('User/my_sites'); ?>">My Sites</a>
                            <a class="dropdown-item" href="<?php echo site_url('User/logs'); ?>">Logs</a>
                            <a class="dropdown-item" href="<?php echo site_url('User/purchase'); ?>">Purchases</a>
                            <a class="dropdown-item" href="#">All Activities</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo site_url('User/logout'); ?>">Logout</a>
                          </div>
                        </div>
                    
                </div>
                
                
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center pt-1 menulist">
                	<div>
                          <button class="btn btn-outline-primary dropdown-toggle drop" type="button" id="MenuButton">
                           <img src="<?php echo base_url('assets/user/image/'.$GLOBALS["profile"]['image']); ?>" width="35" height="35" style="border-radius:50%;"/>  <span style="text-transform:capitalize;"><?php echo $GLOBALS["profile"]['uname']; ?></span>
                          </button>
                          
                    
                    </div>
                    <div class="menulistdrop">
                    		<p><a class="dropdown-item" href="<?php echo site_url('User/show_profile'); ?>">Profile</a></p>
                            <p><a class="dropdown-item" href="<?php echo site_url('User/change_password'); ?>">Change Password</a></p>
                            <p><a class="dropdown-item" href="<?php echo site_url('User/my_sites'); ?>">My Sites</a></p>
                            <p><a class="dropdown-item" href="<?php echo site_url('User/logs'); ?>">Logs</a></p>
                            <p><a class="dropdown-item" href="<?php echo site_url('User/purchase'); ?>">Purchases</a></p>
                            <p><a class="dropdown-item" href="#">All Activities</a></p>
                            <div class="dropdown-divider"></div>
                          	<p><a class="dropdown-item" href="<?php echo site_url('User/logout'); ?>">Logout</a></p>
                    </div>
                </div>
            
            
        </div>
    </div>


<div id="set" align="center" class="pt-5 mt-5 row no-gutters text-center" style="overflow:auto; width:100%;">
<div class="col-lg-12 col-md-12 col-sm-12 col-12" align="center">

