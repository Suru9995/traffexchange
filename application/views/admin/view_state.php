<?php
	$this->load->view('admin/header');
?>
			<script>
				$(document).ready(function(e) {
                    $('#country').change(function(){
						var country=$('#country').val();
						$.ajax({
							
							type:'POST',
							url:"<?php echo site_url('admin/State/ajax_data'); ?>",
							data:
							{
								'country_id':country	
							},
							success:function(data){
								//alert(data);
								$('#demo').html(data);
							}
							
						});
					});
                });
			</script>
            
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>View state</h2>
                <h3><?php if(@$admin_msg){ echo $admin_msg; } ?></h3>
            </div>
            <!-- Basic Table -->
            
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               View state
                            </h2><br>
                            <h2>
                            <form method="post">
                            	<select name="country" id="country">
                                	<option value="">-- Select country --</option>
                                    <?php
                                    	foreach($country as $state){
									?>
                                    	<option value="<?php echo $state['c_id']; ?>"><?php echo $state['name']; ?></option>
                                    <?php }?>
                                </select>
                             </form>
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
                            <table class="table" id='demo'>
                                <thead>
                                    <tr>
                                        <th>Country Id</th>
                                        <th>State Id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($record as $row){?>
                                    <tr>
                                        <th scope="row"><?php echo $row['c_id']; ?></th>
                                        <th scope="row"><?php echo $row['s_id']; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        
                                        <td><a href="<?php echo site_url('admin/State/delete/'.$row['s_id']); ?>">Delete</a> | 
                                        <a href="<?php echo site_url('admin/State/update/'.$row['s_id']); ?>">Update</a></td>
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