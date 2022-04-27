$(function() {
	//Aqui vai todo o codigo javascript.

	$('nav.mobile').click(function(){

		// o que vai acontecer quando clicarmos na nav.mobile
		var listaMenu = $('nav.mobile ul');

		if (listaMenu.is(':hidden') == true) {
			//fa-solid fa-bars
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-solid fa-bars')
			icone.addClass('fa-solid fa-xmark')
			listaMenu.slideToggle();
		}
		else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-solid fa-xmark')
			icone.addClass('fa-solid fa-bars')
			listaMenu.slideToggle();
		}
	})

	if ($('target').length > 0) {
		//existe, então dar scroll para algum lugar
		var elemento = '#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html,body').animate({scrollTop:divScroll},500);
	}

	loadDynamic();
	function loadDynamic(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');


			setTimeout(function() {
				initialize();
				$('.container-principal').fadeIn(300);
				
			})		
		})
	}
})

