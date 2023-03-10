<?php
	$err_msg=array();
	if(@form_error('name')){
		$err_msg['name']=form_error('name');	
	}
	else if(@form_error('email')) {
		$err_msg['email']=form_error('email');	
	}
	else if(@form_error('type')) {
		$err_msg['type']=form_error('type');	
	}
	else if(@form_error('message')) {
		$err_msg['message']=form_error('message');	
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - traffExchange</title>



<?php $this->load->view('master/master_links');
	$this->load->view('master_logo_menu');
 ?>

</head>
<body>

<?php
	$this->load->view('master/scrolltotop');
?>

<div class="contact_main">
	<div class="container">
    	<div class="row no-gutters">
        	<div class="col-lg-12">
            
            </div>
        </div>
        <div class="contact_text">
                	<h1>Contact Us</h1>
                    <p>You can contact us for inquiries like suggestions, advice and other types of queries also. We provide email facility to contact us anytime.</p>
            </div>
    </div>
</div>

<div class="reason">
	<div class="container">
    	<div class="row no-gutters">
        	<div class="col-lg-12 text-center mt-5">
            		<h1>Reason For Inquiry</h1>
                    <p><h5	>Please Select The Purpose For Your Inquiry.</h5></p>
            </div>
        </div>
        
        <div class="row no-gutters text-center mt-5 mb-5">
        	<div class="col-lg-4">
            	<img src="<?php echo base_url('assets/image/social-network.png');?>" width="100"/>
                <h4 class="mt-3">Suggestion</h4>
                <h6 class="mt-3 ml-3 mr-3">Give a suggestion related to website bugs, increments, needs relates to traffic exchange.</h6>
            </div>
            
            <div class="col-lg-4">
            	<img src="<?php echo base_url('assets/image/businessman.png');?>" width="100"/>
                 <h4 class="mt-3">Advice</h4>
                <h6 class="mt-3 ml-3 mr-3">If you have any query, You can ask for advice from us.</h6>
            </div>
            
            <div class="col-lg-4">
            	<img src="<?php echo base_url('assets/image/support.png');?>" width="100"/>
                 <h4 class="mt-3">Other Help</h4>
                <h6 class="mt-3 ml-3 mr-3">We are online 24x7.Anytime, Anywhere.</h6>
            </div>
        </div>
        
    </div>
</div>
<hr>
<div class="contact">
	<div class="container mt-3 mb-3">
    	<div>
        	<h3>Fill Up This Form For Suggestion or Inquiry</h3>

                </div>
                <br>
                
            <form method="post">
          <div class="form-group">
            <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Enter Your Name" value="<?php echo @set_value('name'); ?>" name="name">
                  <font color="red"><?php echo @$err_msg['name']; ?></font>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Enter Your Email"  value="<?php echo @set_value('email'); ?>" name="email">
                  <font color="red"><?php echo @$err_msg['email']; ?></font>
                </div>
              </div>
          </div>
          <div class="form-group">
            	<select name="type" class="form-control">
                	<option value="">-- Select Catagory --</option>
                    <option <?php if(@set_value('type')=='suggestion')echo "selected"; ?>>suggestion</option>
                    
                    <option <?php if(@set_value('type')=="advice"){echo "selected";}?>>advise</option>
                    <option <?php if(@set_value('type')=="other"){echo "selected";}?>>other</option>
                </select>
                <font color="red"><?php echo @$err_msg['type']; ?></font>
          </div>
          <div class="form-group">
            	<textarea placeholder="Enter Message (max 200 char)" class="form-control" name="message"><?php echo @set_value('message'); ?></textarea>
                <font color="red"><?php echo @$err_msg['message']; ?></font>
          </div>
          
          <button type="submit" name="send" value="send" class="btn btn-primary">Submit</button>
        </form>
            
            
        </div>
    </div>
</div>

<?php
	$this->load->view('master/footer_master');
?>
			
</body>
</html>