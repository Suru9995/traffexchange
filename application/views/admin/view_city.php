<?php
	$this->load->view('admin/header');
?>

		
       <script>
				$(document).ready(function(e) {
                    $('#country').change(function(){
						var country=$('#country').val();
						$.ajax({
							
							type:'POST',
							url:"<?php echo site_url('admin/City/ajax_country'); ?>",
							data:
							{
								'country_id':country	
							},
							success:function(data){
								//alert(data);
								$('#state').html(data);
							}
							
						});
					});
					
					
					$('#state').change(function(){
						var state=$('#state').val();
						$.ajax({
							
							type:'POST',
							url:"<?php echo site_url('admin/City/ajax_state'); ?>",
							data:
							{
								'state_id':state	
							},
							success:function(data){
								//alert(data);
								$('#data').html(data);
							}
							
						});
					});
					
					
                });
		</script> 



    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>View city</h2>
                <h3><?php if(@$admin_msg){ echo $admin_msg; } ?></h3>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               View city
                               
                            </h2>
                             <h2>
                            <form method="post">
                            	<select name="country" id="country">
                                	<option value="">-- Select country --</option>
                                    <?php
                                    	foreach($country as $cid){
									?>
                                    	<option value="<?php echo $cid['c_id']; ?>"><?php echo $cid['name']; ?></option>
                                    <?php }?>
                                </select>
                                
                                <select name="state" id="state">
                                	<option value="">-- Select state --</option>
                                    <?php
                                    	foreach($state as $sid){
									?>
                                    	<option value="<?php echo $sid['s_id']; ?>"><?php echo $sid['name']; ?></option>
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
                            <table class="table" id='data'>
                                <thead>
                                    <tr>
                                        <th>State Id</th>
                                        <th>City Id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($record as $row){?>
                                    <tr>
                                        <th scope="row"><?php echo $row['s_id']; ?></th>
                                        <th scope="row"><?php echo $row['city_id']; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        
                                        <td><a href="<?php echo site_url('admin/City/delete/'.$row['city_id']); ?>">Delete</a> | 
                                        <a href="<?php echo site_url('admin/City/update/'.$row['city_id']); ?>">Update</a></td>
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