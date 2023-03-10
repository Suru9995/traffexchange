<?php
	$this->load->view('admin/header');
?><head>
<style>
	#chart-container{
		height:auto;
		width:600px;	
	}
</style>

<script>
	$(document).ready(function(e) {
        $.ajax({
			type:'GET',
			url:"<?php echo site_url('admin/User/get_user_his') ?>",
			success: function(data){
				var user=[];
				var balance=[];
				
				for(var i in data){
					//alert(data[i]);
					user.push("User "+ data[i].uname);
					balance.push(data[i].balance);	
				}
				
				var chartdata={
					labels:user,
					datasets :[
						{
							label : 'User Balance',
							backgroundColor:'rgba(244, 67, 54,.8)',	
							borderColor: 'rgba(200,200,200,.8)',
							hoverBackgroundColor:'rgba(244, 67, 54,1)',
							hoverBorderColor:'rgba(200,200,200,1)',
							data : balance
						}
					]	
				};
				
				var ctx = $('#mycanvas');
				var barGraph = new Chart(ctx , {
					type:'bar',
					data:chartdata		
				});
				
			}
		});
    });
</script>


</head>
    
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>All User Balacne</h2>
                
            </div>
            <!-- Basic Table -->
            <h1>User Balance Chart </h1>
            <div id="chart-container">

                <canvas id="mycanvas"></canvas>
            
            </div>

            <!-- #END# Basic Table -->
            <!-- Striped Rows -->
            
    
    <?php
    	$this->load->view('admin/footer');
	?>