$(function() {

/*------------------------------------*\
	Favoris
\*------------------------------------*/
	$(".slider_img").doubletap(function(){
		$('.favoris').css({'display':'block'}).fadeOut(2000);
	});

/*------------------------------------*\
	Vote
\*------------------------------------*/
	var vote_affiche = true;

	// Apparition du vote
	$('#btn_vote').click(function(e) {
		e.preventDefault();

		if(vote_affiche) {
			$('.product_vote').css({'display':'block'});
			$('.vote').animate({'margin-left':0}, function(){
				vote_affiche = false;
			});
		}
		else {
			$('.vote').animate({'margin-left':'100%'}, function(){
				$('.product_vote').css({'display':'none'});
				vote_affiche = true;
			});
		}

	});

	// Choix de vote
	$('.smiley li').click(function(e){
		e.preventDefault();

		$('.smiley li').removeClass('active');
		$(this).addClass('active');
		$('.resultats_vote').fadeIn('slow');
		$('.resultats_vote li span').css({'font-size': '40px', 'opacity':0});
		$('.resultats_vote li span').animate({'font-size': '14px', 'opacity':1}, 600);
	});

/*------------------------------------*\
	Promotion
\*------------------------------------*/
	var promo = false;

	$('.promotion .button').click(function(){
		if(promo) {
			$('.cadenas').removeClass('lock').addClass('unlock');
		}
		else{
			$('.cadenas').removeClass('unlock').addClass('lock');
		}
	});

/*------------------------------------*\
	Description
\*------------------------------------*/
	$('#description').click(function(e){
		e.preventDefault();

		var titleHeight = $('.description h1').height();
		var pHeight = $('.description p').height();

		// Quand la description est courte 
		if($(this).hasClass('description_off')) {
			$(this).removeClass().addClass('description_on');
			$('.description').animate({ 'height':titleHeight+pHeight+69+14});
		}
		// Quand la description est longue
		else {
			$(this).removeClass().addClass('description_off');
			$('.description').animate({ 'height':'175px'});
		}
	});


});