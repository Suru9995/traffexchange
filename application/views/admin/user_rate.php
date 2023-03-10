<?php
	$this->load->view('admin/header');
	
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All User Rating</h2>
                
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size:20px;">View Rating</span> &emsp;
                            
                                                    
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
                                    	<th>User Id </th>
                                        <th>User name</th>
                                        <th>Rate</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($rating as $row){?>
                                    <tr>
                                    	<td><?php echo $row['uid']; ?></td>
                                    	<td><?php echo $row['uname']; ?></td>
                                    	<td><?php echo $row['rate']; ?></td>
                                    	<td><?php echo $row['time']; ?></td>
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