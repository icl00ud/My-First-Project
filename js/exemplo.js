$(function() {

	var actual = -1;
	var max = $('.box-especialidade').length - 1;
	var timer;
	var animationDelay = 700 //in miliseconds

	execAnimation();
	function execAnimation(){
		$('.box-especialidade').hide();
		timer = setInterval (animation, animationDelay);

		function animation() {
			actual++;
			if (actual > max) {
				clearInterval(timer);
				return false;
			}
			$('.box-especialidade').eq(actual).fadeIn();
		}
	}
})