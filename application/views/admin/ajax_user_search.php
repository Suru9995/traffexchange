
                            <table id="sdata" class="table">
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
                                    	<td colspan="8">
                                        	<?php echo $this->pagination->create_links(); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        