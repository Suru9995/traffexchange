
	$(document).ready(function(e) {
		
			$('.fa-times').hide();
			$('.slide_logo').hide();
			$('.slide_header').hide();
			infinity();

		function infinity(){
			$('.slide_logo').delay(500).fadeIn(1500);
			$('.slide_header').delay(500).slideDown(1500);
			$('.slide_logo').delay(3500).fadeOut(500);
			$('.slide_header').delay(3500).fadeOut(500);
		}	
		
		
		$('.owl-carousel1').owlCarousel({
		
			loop:true,
			margin:10,
			nav:true,
			items:1,
			mouseDrag:false,
			autoplay:true,
			autoplayTimeout:6000,
			navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
			animateIn:'lightSpeedIn',
			animateOut:'lightSpeedOut',
		
		});
		
		
		$('.owl-carousel1').on('changed.owl.carousel',function(){
			
			$('.slide_logo').finish();
			$('.slide_header').finish();
			infinity();
			
		});
		

		$('body').css('overflow', 'auto');

	$('#menu_btn').click(function(){
		$('#menu').slideToggle();
		$('.fa-bars').toggle();
		$('.fa-times').toggle();
		
		
		if($('body').css('overflow')=='auto')
		{
			$('body').css('overflow', 'hidden');
		}else
		{
			$('body').css('overflow', 'auto');
		}
		
		});

	$('.owl-carousel2').owlCarousel({
  			loop:true,
			margin:10,
			nav:true,
			items:1,
			mouseDrag:false,
			autoplay:true,
			autoplayTimeout:5000,
			navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
	})


    });
