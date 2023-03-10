<?php
	$this->load->view('admin/header');
	$countries=$this->User_model->get_countries();
	if(validation_errors())
	{
		$uname=set_value('name');
		$email=set_value('email');
		$password=set_value('password');
		$country=set_value('country');
		$gender=set_value('gender');
		$status=set_value('status');
	}
?>

<script type="text/javascript">
	$(document).ready(function(e){
			
			
			$('#status').click(function(){
					
					if($('#status').prop("checked")==true)
					{
						$('#statustext').html('Active');
					}
					else
					{
						$('#statustext').html('Blocked');
					}
				});
				
				
		});
</script>
	

    <section class="content">
        <div class="container-fluid">
           
						
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add User
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo @$uname; ?>" id="name" class="form-control" placeholder="Enter your Name" name="name">
                                    	
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('name')."</h5>"; ?>
                                </div>
                                
                              <label>Gender</label>
                               <div class="form-group">
                                    <div class="form-line">
                              <input name="gender" type="radio" id="male"  class="with-gap radio-col-red" value="male" <?php if(@$gender=='male'){echo 'checked';} ?>/>
                               	<label for="male">Male</label>&emsp;
                              <input name="gender" type="radio" id="female"  class="with-gap radio-col-red" value="female" <?php if(@$gender=='female'){echo 'checked';} ?>/>
                               	<label for="female">Female</label>  
                                     </div>
                                     <?php	echo "<h5 style='color:red;'>".form_error('gender')."</h5>"; ?>
                                </div>    		
                             
                             <label>Country</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="country">
                                        	<option value="">--Select Country--</option>
                                            <option>temp</option>
                                            <?php foreach($countries as $row){ ?>
                                            	<option <?php if(@$country==$row['name']){echo 'selected';} ?>><?php echo @$row['name']; ?></option>
                                            <?php }?>
                                        </select>
                                    <br><br>
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('country')."</h5>"; ?>
                                    
                                </div>
                             
                             
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email" class="form-control" value="<?php echo @$email; ?>" placeholder="Enter your email" name="email">
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('email')."</h5>"; ?>
                                </div>
                                
                                
                                
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" value="<?php echo @$password; ?>">
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('password')."</h5>"; ?>
                                </div>

                                <label for="image">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="image" class="form-control" name="image">
                                        <?php if(@$image) {?>
                                        <img src="<?php echo base_url('assets/user/image/').$image; ?>" height="50" border="1"> <?php }?>
                                    </div>
                                    <?php echo "<h5 style='color:red;'>".@$file_error."</h5>"; ?>
                                </div>
                                
                                <label>Status</label>
                                <div class="form-group">
                                <br>
                                <div class="switch">
                                            <label><input type="checkbox" id="status" value="Active"  name="status" <?php if(@$status=='Active'){ echo 'checked';} ?>><span class="lever switch-col-green"></span></label>
                                            
                                            <span id="statustext"><?php if(@$status=='Active'){ echo 'Active';}else{echo "Blocked";} ?></span>
                                 </div>
                                
                                </div>
                                
                                <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="<?php if(@$update){ echo 'Update'; }else{ echo 'Add'; } ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- #END# Vertical Layout -->
           
           
        </div>
    </section>
    
	<?php
		$this->load->view('admin/footer');
	?>