<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifications</title>
</head>

<body>
<?php $this->load->view('master/user_master'); 
	if(empty($notification)){echo "<h1>No Notification Available</h1>";die;}
		
?>

    <h1>All Notifications</h1>
    
<table class="table table-sm text-center" align="center">
	<tr>
        <th>Message</th>
        <th>Time</th>
	</tr>
    <?php foreach($notification as $l){ ?>
    <tr>
        <td class="lead text-success"><?php echo $l['msg']; ?></td>
        <td><?php echo $l['time']; ?></td>
    </tr>
    <?php }?>    
</table>
    
</body>
</html>