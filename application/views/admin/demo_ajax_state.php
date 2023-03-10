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
                                	<?php foreach($ajax_state as $row){?>
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