$(function() {

/*------------------------------------*\
	Vote
\*------------------------------------*/
	var vote_affiche = true;

	// Apparition du vote
	$('#btn_vote').click(function() {
		if(vote_affiche) {
			$('.vote').animate({'margin-left':0}, function(){
				vote_affiche = false;
			});
		}
		else {
			$('.vote').animate({'margin-left':'100%'}, function(){
				vote_affiche = true;
			});
		}

	});

	// Choix de vote
	$('.smiley li').click(function(){
		$('.smiley li').removeClass('active');
		$(this).addClass('active');
		$('.resultats_vote').fadeIn('slow');
		$('.resultats_vote li span').css({'font-size': '41px'});
		$('.resultats_vote li span').animate({'font-size': '14px'}, 600);
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