<?php
	$this->load->view('admin/header');
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>View pages</h2>
                <h3><?php if(@$admin_msg){ echo $admin_msg; } ?></h3>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              	View Pages 
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
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Page_title</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($record as $row){?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['page_title']; ?></td>
                                        
                                        <td><a href="<?php echo site_url('admin/Dashboard/del_page/'.$row['id']); ?>">Delete</a> | 
                                        <a href="<?php echo site_url('admin/Dashboard/update_page/'.$row['id']); ?>">Update</a></td>
                                    </tr>
                                    <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
            <!-- Striped Rows -->
            
    
    <?php
    	$this->load->view('admin/footer');
	?>