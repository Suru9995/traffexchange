<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transaction History</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<h1 class="text-center">Transaction History</h1>
<hr class="ml-5 mr-5">
<div id="tbl">
<table  class="table table-striped table-bordered table-hover text-center">
	<tr>
    	<th>Package Name</th>
        <th>Point</th>
        <th>Price</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Mobile</th>
        <th>Transaction Date</th>
        <th>PDF</th>
    </tr>
    <?php
		$total=0;
	 foreach($transaction as $t){ 
    	$total+=$t['price']; ?>
    <tr>
    	<td><?php echo $t['package_name']; ?></td>
        <td><?php echo $t['point']; ?></td>
        <td><?php echo $t['price']; ?></td>
        <td><?php echo $t['uname']; ?></td>
        <td><?php echo $t['email']; ?></td>
        <td><?php echo $t['mobile']; ?></td>
        <td><?php echo $t['date']; ?></td>
        <td><a href="<?php echo site_url('User/print_data/'.$t['t_id']); ?>"><i class="fa fa-file-pdf-o" style="color:red;" title="Download PDF"></i></a></td>
    </tr>
    
    <?php }?>
    
    <tr>
    	<th colspan="8"><?php echo "Total Purchase Amount :  ₹".$total;?></th>
    </tr>
</table>
</div>
<br>

<button onClick="printtbl('tbl')" class="btn btn-primary">Print History</button>
<br>


<script>
	// Print All History
	function printtbl(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
	}



</script>
</body>
</html>