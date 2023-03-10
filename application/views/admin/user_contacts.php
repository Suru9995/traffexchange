<?php
	$this->load->view('admin/header');
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All User Contacts</h2>
                
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size:20px;">User Contacts Feed</span> &emsp;
                            
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
                            <table id="sdata" class="table">
                                <thead>
                                    <tr>
                                        <th>Contact Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Category</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($user_contacts as $row){?>
                                    <tr>
                                    	<td><?php echo $row['contact_id']; ?></td>
                                    	<td><?php echo $row['name']; ?></td>
                                    	<td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['catagory']; ?></td>
                                        <td><?php echo $row['message']; ?></td>
                                        <td><?php echo $row['time']; ?></td>
                                        <td><a href="<?php echo site_url('admin/User/del_contact/'.$row['contact_id']); ?>">Delete</a></td>
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