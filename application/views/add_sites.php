<?php
	if(validation_errors())
	{
		if(@form_error('type')){ $err_msg['type']=form_error('type');}
		elseif(@form_error('url')){ $err_msg['url']=form_error('url');}
		elseif(@form_error('total_click')){ $err_msg['total_click']=form_error('total_click');}
		elseif(@form_error('daily_click')){ $err_msg['daily_click']=form_error('daily_click');}
	}
?>

<head>
<?php $this->load->view('master/master_links'); ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Sites</title>
</head>

<body>
<?php $this->load->view('master/user_master'); ?> 

<script>
	$(document).ready(function(e) {
        $(function () {
  			$('[data-toggle="popover"]').popover()
		})
    });
</script>

<script>
	$(document).ready(function(e) {
		$('#page_type').change(function(){
				var type = $('#page_type').val();
				if(type == "facebook page")
				{
					<?php 
						if(!$this->facebook->is_authenticated())
						{ ?>
							alert('You must have logged in with facebook account');
							window.location="<?php echo site_url('Facebook_data/fb_page'); ?>"	
					<?php	}
					?>	
				}
			});	
	});
</script>



	<h2 align="center">Add Content</h2><hr>
 
  
  <div class="add_form text-left">  
    <form method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Page Type</label>&nbsp;
               
              <a tabindex="0" class="d-inline" role="button" data-toggle="popover" data-trigger="focus" title="What is Page Type" data-content="Page Type Means which type of page you want to add for Likes/view"><i class="fa fa-question-circle text-danger"></i></a>
              
              <select name="type" class="form-control" id="page_type">
                        	<option value="">--Select page type--</option>
                            <?php foreach($user as $page){ ?>
                            	<option  <?php if(@$user_data['category']==$page['page_title']){ echo "selected";} if(@set_value('type')==$page['page_title']){echo "selected";} ?>><?php echo $page['page_title']; ?></option> 
                            <?php }?>
                        </select>	
                        <span class="text-danger p-0 m-0"><?php echo @$err_msg['type']; ?></span>
            </div><div class="form-group col-md-6">
              <label for="status">Status</label>&nbsp;
              
              <a tabindex="0" class="d-inline" role="button" data-toggle="popover" data-trigger="focus" title="What is Status" data-content="Status Active Means Your Post is Visible To Outside World And Deactive Means Now Your Post Not Visible. You Can Change Status Later Mysites Tab"><i class="fa fa-question-circle text-danger"></i></a>
              
              <select id="status" name="status" class="form-control">
                        	<option value="active" <?php if(@$user_data['status']=="active"){ echo "selected";} if(@set_value('status')=="active"){echo "selected";} ?>>Active</option>
                            <option value="deactive" <?php if(@$user_data['status']=="deactive"){ echo "selected";} if(@set_value('status')=="deactive"){echo "selected";} ?>>Deactive</option> 
                        </select>
                        
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputAddress">Page Url</label>&nbsp;
            
            <a tabindex="0" class="d-inline" role="button" data-toggle="popover" data-trigger="focus" title="What is Page URL" data-content="Page Url is a Url Of Your Post Or Page. You can simply Copy Url From Browser And Paste Here , For Add Your Page/Post in Our Site."><i class="fa fa-question-circle text-danger"></i></a>
            
            <input type="url" name="url" value="<?php echo @$user_data['url']; echo @set_value('url'); ?>" class="form-control" placeholder="Enter Page Url">
            <span class="text-danger p-0 m-0"><?php echo @$err_msg['url']; ?></span>
          </div>
         
         
          <div class="form-row">
            <div class="form-group col">
              <label for="inputCity">Total Clicks</label>&nbsp;&nbsp;&nbsp;
              
              <a tabindex="0" class="d-inline" role="button" data-toggle="popover" data-trigger="focus" title="What is Total Clicks" data-content="This Means How Many Total Likes/View in your Page/Post. Make Sure, You Have Enogh Balance For Someone View/Like Your Post. If You Have Not Enough Balance Then Your Post Is Not Visible To Outside World. "><i class="fa fa-question-circle text-danger"></i></a>


                      
              <input type="number" min="1"  value="<?php if(@$user_data['total_clicks']){echo @$user_data['total_clicks'];}elseif(@set_value('total_click')){echo @set_value('total_click');}else{ echo "100"; } ?>" name="total_click" class="form-control">
              <span class="text-danger p-0 m-0"><?php echo @$err_msg['total_click']; ?></span>
            </div>
            <div class="form-group col">
              <label for="inputState">Daily Clicks</label>&nbsp;&nbsp;&nbsp;
   
   				<a tabindex="0" class="d-inline" role="button" data-toggle="popover" data-trigger="focus" title="What is Daily Clicks" data-content="This Means How Many Total Likes/View in your Page/Post Per. You Can Manage Per Day Traffic.">&nbsp;<i class="fa fa-question-circle text-danger"></i></a>
   
             <input type="number" min="1"  value="<?php if(@$user_data['daily_clicks']){echo @$user_data['daily_clicks'];}elseif(@set_value('daily_click')){echo @set_value('daily_click');}else{ echo "10"; }   ?>" name="daily_click" class="form-control">
             <span class="text-danger p-0 m-0"><?php echo @$err_msg['daily_click']; ?></span>

            </div>
            <div class="form-group col">
              <label for="inputZip">C . P . C .</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
              <a tabindex="0" class="d-inline" role="button" data-toggle="popover" data-trigger="focus" title="What is Credit Per Click" data-content="This is Credit means Conis/Point. The number of Point which is Deduct From Your Account When Someone Like/View Your Post.">&nbsp;<i class="fa fa-question-circle text-danger"></i></a>
              
              <input type="number"  value="<?php if(@$user_data['cpc']){echo @$user_data['cpc'];}elseif(@set_value('cpc')){echo @set_value('cpc');}else{ echo "2"; } ?>" min="2" max="20" name="cpc" class="form-control">
            </div>
          </div>
			<br>
          <div class="form-row">
          		
          		<div class="col"></div>
          		<div class="col-6" align="center">
	          		<input type="submit" class="btn btn-primary form-control" value="<?php if(@$user_data){echo "Update";}else{echo "Add";}?>" name="add">
                </div>
                <div class="col"></div>
          </div>
          <div class="dropdown-divider"></div>
        
<?php
	if(@$click_err){
?>
		         <div class="form-row mt-2">
          		
          		<div class="col"></div>
           		<div class="col-12" align="center">
	          		<h2><i class="fa fa-warning text-danger"> <?php echo @$click_err;?></i></h2>
                    <!--<h3 class="text-danger">Need More "<?php //echo @$need;?>" Credits <a href="#" class="d-inline">Buy Now</a></h3>-->
                </div>
                <div class="col"></div>
          </div>

<?php }else{?>
		 <div class="form-row">
          		
          		<div class="col"></div>
          		<div class="col-12" align="center">
	          		<i class="fa fa-warning text-danger"> Make sure you have enough balance before adding post !</i>
                </div>
                <div class="col"></div>
          </div>
<?php }?>
	</form>
    </div>
    
</body>
</html>