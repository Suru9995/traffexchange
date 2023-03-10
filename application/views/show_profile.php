
<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
<style>
	.prof_tbl tr{
		 border-bottom:1px solid #aaa;
	}
</style>
</head>

<body>
<?php $this->load->view('master/user_master'); 
		
?>
	

    <div>
    	<table class="lead text-capitalize text-center prof_tbl table-striped table-responsive{-sm|-md|-lg|-xl}" cellpadding="15" width="50%">
        	<tr>
            	<th colspan="2"><h2>My Profile</h2></th>
            </tr>
            <tr>
            	<th>Name</th>
                <td><?php echo $GLOBALS['profile']['uname']; ?></td>
            </tr>
            <tr>
            	<th>Email</th>
                <td><?php echo $GLOBALS['profile']['email']; ?></td>
            </tr>
            <tr>
            	<th>Gender</th>
                <td><?php echo $GLOBALS['profile']['gender']; ?></td>
            </tr>
            <tr>
            	<th>Country</th>
                <td><?php echo $GLOBALS['profile']['country']; ?></td>
            </tr>
            <tr>
            	<th>Status</th>
                <td><?php echo $GLOBALS['profile']['status']; ?></td>
            </tr>
            <tr>
            	<th>Image</th>
                <td><img src="<?php echo base_url('assets/user/image/').$GLOBALS['profile']['image']; ?>" class="rounded" height="100" width="100" /></td>
            </tr>
             <tr>
                <td colspan="2"><a href="<?php echo site_url('User/update_profile'); ?>" class="btn-outline-primary btn d-inline p-2">Update Profile</a></td>
            </tr>
        </table>
    </div>
   

   
</body>
</html>