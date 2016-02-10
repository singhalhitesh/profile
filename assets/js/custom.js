(function($){
	$(document).ready(function(){
		
		function loadingAdjust() {
			if($(window).width()>767){
				$('.pull-down').each(function(){
					$(this).css('margin-top', $(this).parent().height()-$(this).height()-30)
				});
			} else{
				$('.pull-down').each(function(){
					$(this).css('margin-top', 0)
				});
			}
		}
		loadingAdjust();
	});//ready function
	$(window).resize(function(){	
		if($(window).width()>767){
			$('.pull-down').each(function(){
				$(this).css('margin-top', $(this).parent().height()-$(this).height()-30)
			});
		} else{
			$('.pull-down').each(function() {
				$(this).css('margin-top', 0)
			});
		}
	});
	$(window).scroll(function(){
		if ($(window).scrollTop() > 600) {
			$("footer").addClass("white_bg");
		}
		else {
			$("footer").removeClass("white_bg");
		}
	});
	// Color Change
	/*setInterval(function(){
		$redValue = Math.floor(Math.random()*255);
		$greenValue = Math.floor(Math.random()*255);
		$blueValue = Math.floor(Math.random()*255);	
		$("#color").css(
			"background", "rgba("+$redValue+","+$blueValue+","+$greenValue+", .5)"
		);
	},2000);*/
	//Mouse over change
	$(".bg-switch").mouseover(function () {
		var bgColor = $(this).attr('data-bg-color');
		$('#overlay').css('background', bgColor);
	}).mouseout(function () {
		var bgColor = $(this).attr('data-bg-color');
		$('#overlay').css({"background": "transparent"});
	});
	$(".nav a").mouseover(function () {
		$('#main-menu').addClass('black-bg');
	}).mouseout(function () {
		$('#main-menu').removeClass('black-bg');
	});
})(jQuery);