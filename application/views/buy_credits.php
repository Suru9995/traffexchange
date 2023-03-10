

<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buy Credits</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?>

<div class="container-fluid">
	<div class="row no-gutters text-center">
    	
        <?php foreach($packages as $p){ ?>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        	<div class="m-3 border rounded buys h-75">
                <div style="height:30%;"><img src="<?php echo base_url('assets/image/'.$p['image']); ?>" height="100%"/></div>
                <div style="height:10%;"><h2><?php echo $p['package_name'];?></h2></div>
                <div style="height:40%;"><p class="lead text-justify ml-3 mr-3"><?php echo $p['description'];?></p></div>
               <div style="height:10%;"><h4>₹<?php echo $p['price'];?> / <?php echo $p['point'];?> Credits</h4></div>
                <div style="height:10%;"><a class="btn-large h-100 text-white lead pt-2" style="background-color:<?php echo $p['color'];?>;" href="<?php echo site_url('Purchase_data/purchase/'.$p['p_id']); ?>">Buy Now</a></div>
            </div>
        </div>
        
        <?php }?>
        
    </div>
</div>


    
</body>
</html>




<!--

<div class="col-lg-4 col-md-4 col-sm-12 col-12">
        	<div class="m-3 border rounded buys h-75">
        		<div style="height:30%;"><img src="<?php echo base_url('assets/image/'); ?>" height="100%"/></div>
            	<div style="height:10%;"><h2>Gold Package</h2></div>
                 <div style="height:40%;"><p class="lead text-justify ml-3 mr-3"></p></div>
                <div style="height:10%;"><h4>$5 / 700 Credits</h4></div>
                 <div style="height:10%;"><a class="btn-large h-100 btn-warning text-white lead pt-2" href="<?php ?>">Buy Now</a></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
        	<div class="m-3 border rounded buys h-75">
                <div style="height:30%;"><img src="<?php echo base_url('assets/image/'); ?>" height="100%"/></div>
                <div style="height:10%;"><h2>Silver Package</h2></div>
                  <div style="height:40%;"><p class="lead text-justify ml-3 mr-3"></p></div>
                <div style="height:10%;"><h4>$2 / 250 Credits</h4></div>
                <div style="height:10%;"><a class="btn-large h-100 btn-secondary text-white lead  pt-2" href="<?php ?>">Buy Now</a></div>
            </div>
        </div>
        -->