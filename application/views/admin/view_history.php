<?php
	$this->load->view('admin/header');
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h3><?php if(@$admin_msg){ echo $admin_msg; } ?></h3>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                History of Users                               
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
                                        <th>Post Id</th>
                                        <th>User Id</th>
                                        <th>User Ip</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($record as $row){?>
                                    <tr>
                                        <th scope="row"><?php echo $row['post_id']; ?></th>
                                        <td><?php echo $row['uid']; ?></td>
                                        <td><?php echo $row['user_ip']; ?></td>
                                        <td><?php echo $row['time']; ?></td>
                                        <td><a href="<?php echo site_url('admin/Dashboard/del_history/'.$row['hid']); ?>">Delete</a></td>
                                    </tr>
                                    <?php }?>
      								
                                    <tr  class="text-center">
                                    	<td colspan="5"><?php echo $this->pagination->create_links(); ?></td>
                                    </tr>                              
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