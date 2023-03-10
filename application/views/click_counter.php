<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Click Counter</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

	

    <h1>Click Counter</h1>
   
<table class="table table-sm text-center" align="center">
	<tr>
        <th>Post Url</th>
        <th>Total Clicks</th>
        <th>Clicked (times)</th>
        <th>Remaining Clicks</th>
	</tr>
    <?php foreach($click_counter as $l){ ?>
    <tr>
    	<td><?php echo $l['url']; ?></td>
        <td><?php echo $l['total_clicks']; ?></td>
        <td><?php echo $l['click']; ?></td>
        <td><?php echo $l['total_clicks']-$l['click'];?></td>
    </tr>
    <?php }?>    
</table>
    
</body>
</html>