<html>

<head>
<?php $this->load->view('master/master_links'); ?>
</head>

<body>

<div id="wait">
	<h1 align="center">Your print is generating...Please wait...</h1>
</div>
<div id="pdf" class="d-none">
<div align="center">
<div align="center" class="pdf_div text-left pl-3 pt-3 lead" style="width:600px; font-family:calibari;">
	
    <p id="tmp"></p>
    
		
    <img src="<?php echo base_url('assets/image/logo.png');?>" width="200"/>
    <br><br>
    <h4><b>Invoice / Receipt</b></h4>
    <br>
    Date : <?php echo $transaction['date']; ?>.
    <br>
    You purchased <strong><b><b><?php echo $transaction['package_name']; ?></b></b></strong>, &emsp;&emsp;&emsp;   <img src="<?php echo base_url('assets/image/').$transaction['image'];?>" width="100" height="100"/>
    <br><br>
    &nbsp;<strong><b>Bill to :</b></strong><br>
    &nbsp;<?php echo $transaction['uname']; ?><br>
    &nbsp;<?php echo $transaction['email']; ?><br>
    &nbsp;<?php echo $transaction['mobile']; ?><br>
    <hr>
    <strong><b>Payment Information</b></strong><br>
    &nbsp;<strong><b>Item : </b></strong><?php echo $transaction['package_name']; ?><br>
        &nbsp;<strong><b>Paid : </b></strong><big>₹<?php echo $transaction['price']; ?></big><br>
            &nbsp;<strong><b>Points : </b></strong><?php echo $transaction['point']; ?><br>
     <hr>
     <h3 align="center" class="text-success"><i class="fa fa-smile-o"></i> Thank you for purchase <i class="fa fa-smile-o"></i> </h3>
   
</div>
</div>	
</div>


<div class="text-center d-none" id="buttons">
<button class="btn btn-danger" onClick="printagain()" style="margin-bottom:100px;">Print Again</button>
<a class="btn btn-danger" style="margin-bottom:100px;" href="<?php echo site_url('User/purchase'); ?>">Go Back</a>
</div>


<script>
	$(document).ready(function(e) {
		 //window.print();
		 //window.location='<?php echo site_url('User/purchase'); ?>';
		//window.onbeforeprint=alert('complete');
		
		    
		     setTimeout(function(){ 
		     
			     
			      var printContents = document.getElementById('pdf').innerHTML;
			     var originalContents = document.body.innerHTML;
			
			     document.body.innerHTML = printContents;
							
			
			     window.print();
				//window.location='<?php echo site_url('User/purchase'); ?>';
			     
			     document.body.innerHTML = originalContents; 
		     		$('#pdf').addClass('d-block');
		     		$('#buttons').addClass('d-block');
		     		$('#wait').hide();
				
		      }, 3000);
		     
		    
	
    });
	 function printagain()
		     {
		     	var printContents = document.getElementById('pdf').innerHTML;
		     var originalContents = document.body.innerHTML;
		
		     document.body.innerHTML = printContents;
		
		     window.print();
			//window.location='<?php echo site_url('User/purchase'); ?>';
		     document.body.innerHTML = originalContents; 
		     }
</script>

</body>
</html>