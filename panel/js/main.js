$(function () {
	
	var open = true;
	var windowSize = $(window)[0].innerWidth;

	if (windowSize <= 1200) {
		open = false;
	}

	$('.menu-button').click(function() {
		if (open) {
			//Se o menu estiver aberto:
			$('.menu').animate({'width':0}, 1);
			$('.content, header').css('width','100%');
			$('.content, header').animate({'left':0},800);
				open = false;
		}else{
			//Se o menu estiver fechado:
			$('.menu').css('display','block');
			$('.menu').animate({width:'15%'}, 1);
			$('.content, header').animate({left:'15%'}, 1050);
			$('.content, header').animate({width:'85%'}, 900);
				open = true;

		}
	})
})