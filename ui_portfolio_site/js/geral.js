$(function(){

	/*******************************************************
    *  PÁGINA INICIAL
	*******************************************************/
	$(document).ready(function() {

		var alturaTela  = $(window).height();
		 $("#carrosselDestaque .item").css({"height":alturaTela});
		 
  		$("#carrosselDestaque").owlCarousel({
			items : 1,
	        dots: true,
	        //loop: true,
	        lazyLoad: true,
	        mouseDrag: true,
	        autoplay:true,
		    autoplayTimeout:5000,
		    autoplayHoverPause:true,
		    animateOut: 'fadeOut',
		    smartSpeed: 450,
		    autoplaySpeed: 4000,
  		});
  		var carrossel_destaque = $("#carrosselDestaque").data('owlCarousel');
		$('.navegacaoDestqueTras').click(function(){ carrossel_destaque.prev(); });
		$('.navegacaoDestqueFrent').click(function(){ carrossel_destaque.next(); });

 	});
	
});		