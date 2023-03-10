<?php
	$this->load->view('admin/header');
	
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Country</h2>
            </div>
						
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Country
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
                                
                                <!--<label for="email_address">C_id</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo @$update['c_id']; ?>" id="email_address" class="form-control" placeholder="Enter your Name" name="countryid">
                                    </div>
                                </div> -->
                                
                                
                                <label for="email_address">Country name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" value="<?php echo @$update['name']; ?>" placeholder="Enter your email" name="countryname">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                        <input type="submit" id="email_address" name="submit" class="btn btn-primary" value="<?php if(@$update){ echo 'Update'; }else{ echo 'Add'; } ?>">
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