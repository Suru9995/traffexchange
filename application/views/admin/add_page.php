<?php
	$this->load->view('admin/header');
	
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Page To Generate trafffic</h2>
            </div>
						
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Pages
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
                                <label for="page">Page Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="page" class="form-control" value="<?php echo @$update_rec['page_title']; ?>" placeholder="Enter your Page Title" name="page_title">
                                    </div>
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