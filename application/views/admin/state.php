<?php
	$this->load->view('admin/header');
	$country_id=$this->State_model->get_cid();
	
	if(validation_errors())
	{
		$c_id=set_value('countryid');
		$name=set_value('statename');
	}
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>States</h2>
            </div>
						
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add State
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
                            
                            
                            	
                            	<label>Country</label>
                                <div class="form-group">
                                 <div class="form-line">     
                                      <select class="show-tick" name="countryid">
                                        <option value="">--Select Country --</option>
                                        <?php
											foreach($country_id as $cid)
											{
												
										?>
                                        <option <?php if($cid['c_id']==@$c_id){ echo 'selected';} ?> value="<?php echo $cid['c_id']; ?>"><?php echo $cid['name']; ?></option>
                                        
                                        <?php
											}
										?>
                                      </select>
                                 </div>     
                                 	 <?php	echo "<h5 style='color:red;'>".form_error('countryid')."</h5>"; ?>
                                </div>
                            
                                
                                
                                <label for="email_address">State name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" value="<?php echo @$name; ?>" placeholder="Enter State name" name="statename">
                                    </div>
                                     <?php	echo "<h5 style='color:red;'>".form_error('statename')."</h5>"; ?>
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