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