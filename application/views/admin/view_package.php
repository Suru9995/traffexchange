<?php
	$this->load->view('admin/header');
?>
    <section class="content">
        <div class="container-fluid">
         
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               View package
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Package Name</th>
                                        <th>Point</th>
                                        <th>Price</th>
                                        <th width="450">Description</th>
                                        <th>Color</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($rec as $row){?>
                                    <tr>
                                    
                                        <th scope="row"><?php echo $row['p_id']; ?></th>
                                        <td><?php echo $row['package_name']; ?></td>
                                        <td><?php echo $row['point']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td><?php echo $row['description']; ?></td>
                                        <td class="text-center"><font class="fa fa-square" style="font-size:25px;" color="<?php echo $row['color']; ?>"></font></td>
                                        
                                        <td><a href="<?php echo site_url('admin/Dashboard/del_package/'.$row['p_id']); ?>">Delete</a> | 
                                        <a href="<?php echo site_url('admin/Dashboard/update_package/'.$row['p_id']); ?>">Update</a></td>
                                    
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