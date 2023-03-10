								<select name="state" id="state">
                                	<option value="">-- Select state --</option>
                                    <?php
                                    	foreach($state as $state){
									?>
                                    	<option value="<?php echo $state['s_id']; ?>"><?php echo $state['name']; ?></option>
                                    <?php }?>
                                </select>