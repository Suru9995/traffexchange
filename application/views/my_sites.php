<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Sites</title>
</head>

<body>

<?php $this->load->view('master/user_master'); ?>

<table align="center" class="table-striped table text-center">
	<thead>
    <tr>
    	<th scope="col">Category</th>
        <th scope="col">Url</th>
        <th scope="col">Country</th>
        <th scope="col">Daily Clicks</th>
        <th scope="col">Total Clicks</th>
        <th scope="col">C.P.C</th>
        <th scope="col">Status</th>
        <th scope="col">Post Date</th>
        <th scope="col">Operation</th>
    </tr>
    </thead>
    <?php
		foreach($data as $row)
		{
	?>
    	<tr>
        	<th><?php echo $row['category']; ?></th>
            <td><a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a></td>
            <td><?php echo $row['country']; ?></td>
            <td><?php echo $row['daily_clicks']; ?></td>
            <td><?php echo $row['total_clicks']; ?></td>
            <td><?php echo $row['cpc']; ?></td>
            <td><a href="<?php echo site_url('User/change_status/'.$row['post_id'].'/'.$row['status']); ?>"><?php echo $row['status']; ?></a></td>
            <td><?php echo $row['post_date']; ?></td>
            <td><!--<span><a href="<?php echo site_url('User/update_site/'.$row['post_id']); ?>" style="display:inline;">Edit</a> / --><a href="<?php echo site_url('User/delete/'.$row['post_id']); ?>" style="display:inline;"><i class="fa fa-trash"></i></a></span></td>
        </tr>
    <?php
		}
	?>
</table>

    
  </div>
  </div> 
</body>
</html>