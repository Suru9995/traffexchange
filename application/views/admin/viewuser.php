<?php
	$this->load->view('admin/header');
?>

<script>
	$(document).ready(function(e) {
        $('.status').click(function(){
			var uid = $(this).data('status_id');
			var status=$(this).data('status_nm');
			
			if(status=='Active'){
				status='Blocked';	
			}else {
				status='Active';
			}
			
			$.ajax({				
				type:'POST',
				url:"<?php echo site_url('admin/User/user_status'); ?>",
				data:
				{
					'uid':uid,
					'status':status	
				},
				success: function(data){
					if(data){
						location.reload();
					}
				}
					
			});				
		});
		
	});
	
	$(document).ready(function(e) {
        $('#search').keyup(function(){
			var name=$('#search').val();
			$.ajax({
				type:'POST',
				data:{
					'sname':name
				},
				url:"<?php echo site_url('admin/User/name_search'); ?>",
				success: function(data){
					$('#sdata').html(data);
				}
			});
				
		});
    });
</script>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All Users List</h2>
                <h3><?php if(@$admin_msg){ echo $admin_msg; } ?></h3>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size:16px;">Search </span> &emsp;
                            
                            <input type="text" value="<?php echo @$this->session->userdata('search_name');?>" name="search" id="search" placeholder="Search By name" />
                            
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
                        
                        <div class="body table-responsive" id="sdata">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($record as $row){?>
                                    <tr>
                                        <th scope="row"><?php echo $row['uid']; ?></th>
                                        <td><?php echo $row['uname']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['country']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        
                                        <td>
                                        
                                        	<?php if($row['status']=='Active'){ ?><span class="label label-success"><?php echo $row['status']; ?></span>
											<?php }else{ ?><span class="label label-danger"><?php echo $row['status']; ?></span>
                                            <?php } ?>
											
                                            <div class="form-group">
                                            <br>
                                            <div class="switch">
                                                        <label><input type="checkbox" class="status"  data-status_nm="<?php echo $row['status']; ?>" data-status_id="<?php echo $row['uid']; ?>" value="<?php echo $row['status']; ?>"  name="status" <?php if($row['status']=='Active'){ echo 'checked'; } ?>><span class="lever switch-col-green"></span></label>
                                                        
                                             </div>
                                            </div>
                                            
										</td>
                                        <td>
											<img src="<?php echo base_url('assets/user/image/').$row['image']; ?>" width="60" height="60" style="border-radius:5%;">                
                                        </td>
                                        <td><a href="<?php echo site_url('admin/User/delete/'.$row['uid']); ?>">Delete</a> | 
                                        <a href="<?php echo site_url('admin/User/update/'.$row['uid']); ?>">Update</a></td>
                                    </tr>
                                    <?php }?>
										<tr class="text-center">
                                        	<td colspan="8"><?php echo $this->pagination->create_links(); ?></td>
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