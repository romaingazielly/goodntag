$(function() {
	var vote_affiche = true;

	$('#btn_vote').click(function() {
		if(vote_affiche) {
			$('.smiley').animate({'margin-left':0}, function(){
				vote_affiche = false;
			});
		}
		else {
			$('.smiley').animate({'margin-left':'100%'}, function(){
				vote_affiche = true;
			});
		}

	});
});