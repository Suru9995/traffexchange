<?php
	if(validation_errors())
	{
		$error=array();
		if(@form_error('username')){ $error['username']=form_error('username'); }
		elseif(@form_error('password')){ $error['password']=form_error('password'); }
		
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - traffExchange</title>

<?php

	$this->load->view('master/master_links');
	$this->load->view('master_logo_menu');

	if(@$email_fail!='')
	{ ?>
		<script>
			$(document).ready(function(e) {
                $('#email_modal').modal('show');
            });
		</script>
<?php }
?>

<?php
	if(@$pass_reset!='')
	{ ?>
		<script>
			$(document).ready(function(e) {
                $('#pass_reset').modal('show');
            });
		</script>
<?php }
?>

<style>
.login_box p
{
	margin:0 !important;
}
</style>

</head>
<body class="login_body">

	<div class="login_page">
    	<div class="container">
        	<div class="row no-gutters">
            	<div class="col-lg-6 col-md-6">
                    <div class="login_box">
                    	<h1 align="center">Login</h1>
                       <form method="post">
                        <div class="username">
                       		<input type="text" name="username" value="<?php echo @set_value('username'); ?>" placeholder="Enter User Email"/>
                            <span class="text-danger p-0 m-0"><?php echo @$error['username']; ?></span>
                        </div>
                        <div class="username key">
                            <input type="password" name="password" placeholder="Enter Password"/>
                                                    <span class="text-danger p-0  m-0"><?php echo @$error['password']; ?></span>
                        </div>                        
                        <div>
                        	<label><input type="checkbox" class="checkbox" name="remember" value="true"/><span style="padding-left:5px; margin-top:5px;">Remember Me</span></label>
                        </div>
                        <p><font color="red"><?php echo @$login_err; ?></font></p>
                        <hr>
                        <div class="login_btn">
                        	<input type="submit" name="login" class="btn btn-success" value="login"/>
                        </div>
                        <h6 align="center"><a href="#email_modal" data-dismiss="modal" data-toggle="modal">Forgot Password?</a></h6>
                       </form>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="reg_box">
                    	<img src="<?php echo base_url();?>assets/image/user.png" style="width:100px;" />
                        <h3>Try Now For Free !!</h3>
                        <p>TraffExchange is worldwide community for increase website traffic. It is 100% Secure & Free</p>
                        <a href="<?php echo site_url('Home/register'); ?>" class="btn btn-outline-light">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>






<!-- Email modal -->

<div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login_modalLabel">Enter Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
            <p><input type="text" class="span3 col-sm-8" name="email" placeholder="Enter Email"></p>
            <p><input type="submit" class="span3 btn btn-primary" name="submit_email" value="Request"></p>
            <font class="lead" color="red"><?php echo @$email_fail; ?></font>
            </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Password Reset -->

<div class="modal fade" id="pass_reset" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="login_modalLabel">Notification !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p><?php  echo @$pass_reset; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>