
<html>
<head>
<?php
$this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment</title>
<style>
p,.form-group{margin:0;}
</style>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

	

    <h2>Payment description</h2>

   <br><br>	
	
<div class="col-lg-6 col-md-6 col-sm-12 col-12">
	<div class="add_form" align="center">
        <form method="post" action="<?php echo $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
        
			    <input type="hidden" name="key" value="<?php echo $mkey; ?>" />
                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                <input type="hidden" name="txnid" value="<?php echo $tid; ?>" />
        		 <input name="surl" value="<?php echo $success; ?>" size="64" type="hidden" />
                 <input name="furl" value="<?php echo $failure; ?>" size="64" type="hidden" />  
                  <!--for test environment comment  service provider   -->
                 <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                 <input name="curl" value="<?php echo $cancel; ?> " type="hidden" />
        
			<table align="center" cellpadding="5" cellspacing="5" style="text-align:left;" class="table table-striped">
            	<tr>
                	<td>Package Name : </td>
                    <td>
                    	<?php echo $data['package_name'];?>	
                        <input type="hidden" name="productinfo" value="<?php echo $data['package_name'];?>" />
                    </td>
                </tr>
                <tr>
                	<td>Price : </td>
                    <td>
                    	<?php echo $data['price'];?>	
                        <input type="hidden" name="amount" value="<?php echo $data['price'];?>" />
                    </td>
                </tr>
                <tr>
                	<td>Full Name : </td>
                    <td>
                    	<?php echo $data['name'];?>	
                        <input type="hidden" name="firstname" value="<?php echo $data['name'];?>" />
                    </td>
                </tr>
                <tr>
                	<td>Email : </td>
                    <td>
                    	<?php echo $data['email'];?>	
                        <input type="hidden" name="email" value="<?php echo $data['email'];?>" />
                    </td>
                </tr>
                <tr>
                	<td>Mobile : </td>
                    <td>
                    	<?php echo $data['mobile'];?>	
                        <input type="hidden" name="phone" value="<?php echo $data['mobile'];?>" />
                    </td>
                </tr>
                <tr>
                	
                    <td colspan="2" class="text-center">
                    	<button type="submit" value="submit" class="btn btn-primary">Buy Now</button>
                       
                    </td>
                </tr>
                
            </table>	            
        </form>
	</div>

</div>

    
</body>
</html>