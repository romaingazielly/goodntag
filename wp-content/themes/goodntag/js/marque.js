$(function(){

/*------------------------------------*\
	Fusion du logo dans la TopBar
\*------------------------------------*/
	// Obtient le nombre de pixels défilés
	var positionLogoBig = $(window).scrollTop();
	var widthLogoCurrent;
	$(window).scroll(function() {
		positionLogoBig = $(window).scrollTop();
		widthLogoCurrent = $('#logo-big').width();
		heightLogoCurrent = $('#logo-big').height();

		var heightLogoMini = 44;
        var coef = heightLogoCurrent / heightLogoMini;
		
		console.log('positionLogoBig: '+positionLogoBig);

		// A partie de 350 le logo commence à se resize
		if(positionLogoBig > 350) {
			reducer = (positionLogoBig - 350) / 2;
			marginLeft = widthLogoCurrent/-2;
			console.log('reducer :'+reducer+' marginleft : '+marginLeft);
			console.log('Logo big width: '+widthLogoCurrent);

			$('#logo-big').css({
				'height':  heightLogoCurrent - reducer,
				'margin-left': marginLeft,
				'min-height': heightLogoMini // Résultat final, quand  scroll = 393px
			});
		}
		if(positionLogoBig == 393) {

		}
		else{
			// 	$('#logo-big').css({
			// 	'margin-left': widthLogoCurrent/-2,
			// 	'height': newSize,
			// 	'min-height': heightLogoMini // Résultat final, quand  scroll = 393px
			// });
		}

	});

});