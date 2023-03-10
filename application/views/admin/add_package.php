<?php

$this->load->view('admin/header');
	
?>

    <section class="content">
        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Packages
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
                                <label for="page">Package Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php if(@set_value('package_name')){echo set_value('package_name');} elseif(@$up_rec['package_name']){echo @$up_rec['package_name'];}  ?>" class="form-control"  placeholder="Enter your Package Name (eg. Gold Package)" name="package_name">

                                    </div>
                                    <font color="red" size="+1" style="padding:0px !important;"><?php echo @$name_err; ?></font>
                                </div>
                                
                                <label for="page">Package Point</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="<?php if(@set_value('package_point')){echo set_value('package_point');} elseif(@$up_rec['point']){echo @$up_rec['point']; } ?>" class="form-control"  placeholder="Enter your Package Points" name="package_point">
                                    </div>
                                    <font color="red" size="+1" style="padding:0px !important;"><?php echo @$point_err; ?></font>
                                </div>
                                
                                <label for="page">Package Price</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="<?php if(@set_value('package_price')){echo set_value('package_price');} elseif(@$up_rec['price']){ echo @$up_rec['price']; } ?>" class="form-control"  placeholder="Enter your Package Price" name="package_price">
                                    </div>
                                    <font color="red" size="+1" style="padding:0px !important;"><?php echo @$price_err; ?></font>
                                </div>
                                
                                <label for="page">Package Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="<?php if(@set_value('package_desc')){echo set_value('package_desc');} elseif(@$up_rec['description']){echo @$up_rec['description'];}   ?>" class="form-control"  placeholder="Enter your Package Description" name="package_desc">
                                    </div>
                                    <font color="red" size="+1" style="padding:0px !important;"><?php echo @$desc_err; ?></font>
                                </div>
                                
                                <label for="page">Package Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" value="<?php if(@$up_rec['image']){ echo @$up_rec['image'];} ?>" class="form-control" name="package_image">
                                    </div>
                                    <font color="red" size="+1" style="padding:0px !important;"><?php echo @$img_err; ?></font>
                                </div>
                                
                                <label for="page">Package Color</label> ( as per image )
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="color" class="" name="package_color" value="<?php if(@set_value('package_color')){echo set_value('package_color');} elseif(@$up_rec['color']){echo @$up_rec['color'];}else{echo "#1F91F3";}   ?>">
                                    </div>
                                    <font color="red" size="+1" style="padding:0px !important;"><?php echo @$color_err; ?></font>
                                </div>
                                
                                <div class="form-group">
                                       <input type="submit" name="submit" class="btn btn-primary">
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