<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logs</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

<h2><br>
	<a href="<?php echo site_url('User/view_logs');?>">All Logs</a><hr>
	<a href="<?php echo site_url('User/daily_logs');?>">Daily Logs</a><hr>	
    <a href="<?php echo site_url('User/click_counter_sites');?>">Click Counter</a><hr>
    <a href="<?php echo site_url('User/view_counter_sites');?>">View Counter</a>
</h2>

</body>
</html>