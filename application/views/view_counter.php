<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Click Counter</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

	

    <h1>View Counter</h1>
<!--   
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
  -->
 <?php //echo '<pre>'; print_r($tot_view); ?>  
 
		
    
    <table width="60%" class="table text-center table-hover table-striped table-bordered">
	<tr class="lead">
    	<th>Post</th>
        <th>View / Like / hits</th>
    </tr>
 	<?php foreach($tot_view as $view){ ?>   
    <tr>
    	<?php $v=$this->User_data_model->get_viewer_count($view['post_id']); ?>
        <th><a href="<?php echo $view['url']; ?>" target="_blank"><?php echo $view['url']; ?></a></th>
        <th><?php echo $v; ?></th>
    </tr>   
 	<?php }?>       
</table>
        
           
 
  
  
  
  
  
</body>
</html>