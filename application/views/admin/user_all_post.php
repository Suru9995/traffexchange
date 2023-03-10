<?php
	$this->load->view('admin/header');
?>

<script>	
	$(document).ready(function(e) {
    	$('#category').change(function(){
			var category=$('#category').val();
			$.ajax({
				type:'POST',
				url:"<?php echo site_url('admin/User/search_category'); ?>",
				data:{
					's_category':category	
				},
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
                <h2>All Users Posts</h2>
                <h3><?php if(@$admin_msg){ echo $admin_msg; } ?></h3>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <span style="font-size:16px;">Search As category </span> &emsp;
                           
                            <select style="height:30px; border-radius:5px; box-shadow:1px 1px 5px rgba(0,0,0,.4);" id="category">
                            	<option value="">-- All Category --</option>
                                <?php
									foreach($page_types as $p){
									?>
                                    	<option <?php if(@$this->session->userdata('cat')==$p['page_title']){echo "selected";} ?>><?php echo $p['page_title'];?></option>
									<?php
                                    
								}	
								?> 
                            </select>
                            
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
                                        <th>post Id</th>
                                        <th>User Name</th>
                                        <th>Post category</th>
                                        <th>Country</th>
                                        <th>Post Url</th>
                                        <th>daily click</th>
                                        <th>total click</th>
                                        <th>cpc</th>
                                        <th>Post Status</th>
                                        <th>Post Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($user_post as $row){?>
                                    <tr>
                                        <th scope="row"><?php echo $row['post_id']; ?></th>
                                        <td><?php echo $row['uname']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $row['country']; ?></td>
                                        <td><a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a></td>
                                        <td><?php echo $row['daily_clicks']; ?></td>
                                        <td><?php echo $row['total_clicks']; ?></td>
                                        <td><?php echo $row['cpc']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['post_time']; ?></td>
                                        
                                    </tr>
                                    <?php }?>
									<tr class="text-center">
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