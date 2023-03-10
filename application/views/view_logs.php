<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Logs</title>
</head>

<body>
<?php $this->load->view('master/user_master'); 
	if(empty($logs)){echo "<h1>No logs Available</h1>";die;}
		
?>

    <h1>All Logs</h1>
    
<table class="table table-sm text-center" align="center">
	<tr>
    	<th>Post Category</th>
        <th>Post URL</th>
        <th>Viewer name</th>
        <th>Viewer IP</th>
        <th>Time</th>
	</tr>
    <?php foreach($logs as $l){ ?>
    <tr>
    	<td><?php echo $l['category']; ?></td>
    	<td><?php echo $l['url']; ?></td>
        <td><?php echo $l['uname']; ?></td>
        <td><?php echo $l['user_ip']; ?></td>
        <td><?php echo $l['time']; ?></td>
    </tr>
    <?php }?>    
</table>
    
</body>
</html>