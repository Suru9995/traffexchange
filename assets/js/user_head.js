// JavaScript Document

	$(document).ready(function(e) {
		var flag=1;
		$('.user_left').hide();
		
        $('.fa-bars').click(function(){
			//alert('hello');
			$('.menulistdrop').slideUp(500);
			if(flag==0)
			{	
				$('.user_left').hide(500);
				$('#tog').removeClass('user_right');
				$('#tog').addClass('user_right_hide');
				$('#set').removeClass('setting');
				flag=1;
			} 
			else
			{
				flag=0;
				$('.user_left').show(500);
				$('#tog').addClass('user_right');
				$('#tog').removeClass('user_right_hide');
				$('#set').addClass('setting');
			}
			
		});
		
		$('#MenuButton').click(function(){
			
				$('.menulistdrop').slideToggle(500);
			});
    });
