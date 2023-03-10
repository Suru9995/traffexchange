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
                                	<?php foreach($city as $row){?>
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