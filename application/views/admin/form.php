<?php
	$this->load->view('admin/header');
	if(validation_errors())
	{
		$name=set_value('name');
		$email=set_value('email');
		$password=set_value('password');
	}
?>

    <section class="content">
        <div class="container-fluid">
            
						
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Admin
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
                                <label for="email_address">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo @$name; ?>" id="email_address" class="form-control" placeholder="Enter your Name" name="name">
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('name')."</h5>"; ?>
                                </div>
                                
                                
                                <label for="email_address">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" value="<?php echo @$email; ?>" placeholder="Enter your email" name="email">
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('email')."</h5>"; ?>
                                </div>
                                
                                
                                
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" value="<?php echo @$password; ?>" class="form-control" name="password" placeholder="Enter your password">
                                    </div>
                                    <?php	echo "<h5 style='color:red;'>".form_error('password')."</h5>"; ?>
                                </div>

                                <label for="email_address">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="email_address" class="form-control" name="image">
                                        <?php if(@$image) {?>
                                        <img src="<?php echo base_url('assets/admin/images/').$image; ?>" height="50"> <?php }?>
                                    </div>
                                    <?php echo "<h5 style='color:red;'>".@$file_error."</h5>"; ?>
                                </div>
                                
                                <div class="form-group">
                                        <input type="submit" id="email_address" name="submit" class="btn btn-primary btn-lg" value="<?php if(@$update){ echo 'Update'; }else{ echo 'Add'; } ?>">
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