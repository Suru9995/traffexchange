<head>
	<?php $this->load->view('master/master_links'); ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Profile</title>
</head>


<body>
	<?php $this->load->view('master/user_master'); ?>


	<h2 align="center">Update Profile</h2><hr>
    
    
    <div class="add_form" align="center">
        <form method="post" enctype="multipart/form-data">
			<table align="center" cellpadding="5" cellspacing="5" style="text-align:right">
            	<tr>
                	<td>Name : </td>
                    <td>
                    	<input type="text" name="name" value="<?php echo @$user_data['uname']; ?>" class="form-control">	
                    </td>
                </tr>
                
                <tr>
                	<td>gender : </td>
                    <td class="text-left"><label><input type="radio" name="gender" <?php if(@$user_data['gender']=="male") { echo "checked"; }?> value="male">&nbsp; Male</label> &emsp;
                    	<label><input type="radio" name="gender" <?php if(@$user_data['gender']=="female") { echo "checked"; }?> value="female">&nbsp; Female</label> 
                    </td>
                </tr>
                
                
                <tr>
                	<td>Country : </td>
                    <td>
                    	<select name="country" class="form-control">
                        	<option value="">---Select Country---</option>
                            <?php foreach($country as $c) {?>
                            	<option <?php if($c['name']==$user_data['country']) { echo "selected"; }?>><?php echo $c['name'];?></option>
                            <?php }?>
                        </select> 
                    </td>
                </tr>
                
                <tr>
                    <td>Image : </td>
                    <td><input type="file" name="image">
                    	<img src="<?php echo base_url('assets/user/image/'.$user_data['image'])?>" height="70" width="70" style="border-radius:5px;">
                    </td>
                </tr>
                
                <tr>
                	<td></td>
                	<td><input type="submit" class="btn btn-primary form-control" value="update" name="update"></td>
                </tr>
                
            </table>	            
        </form>
	</div>
    
    
	    
</body>
