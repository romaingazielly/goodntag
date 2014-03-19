$(function() {

/*------------------------------------*\
	Favoris
\*------------------------------------*/
	var alsoFav = false;

	var registerProductFav = function () {
		var id = $('section[data-product-id]').attr('data-product-id');
		console.log('register fav id : '+id)
		$.ajax({
			type: 'POST',
			url: SITE_URL + '/ajax/add_product_fav.php',
			dataType: 'json',
			data: {
				id: id
			}
		});
	};

	var deleteProductFav = function () {
		var id = $('section[data-product-id]').attr('data-product-id');
		console.log('delete fav id : '+id)
		$.ajax({
			type: 'POST',
			url: SITE_URL + '/ajax/delete_product_fav.php',
			dataType: 'json',
			data: {
				id: id
			}
		});
	}

	var registerVote = function (vote) {
		var id = $('section[data-product-id]').attr('data-product-id');
		console.log('vote '+vote+' for : '+id)
		$.ajax({
			type: 'POST',
			url: SITE_URL + '/ajax/vote.php',
			dataType: 'json',
			data: {
				id: id,
				vote: vote
			}
		});
	}

	$(".slider_img").doubletap(function(){
		if(alsoFav) {
			deleteProductFav();
			$('.fav_img').removeClass('like').addClass('unlike');
			$('.favoris').css({'display':'block'}).fadeOut(1500);
			alsoFav = false;
		}
		else {
			
			registerProductFav();
			$('.fav_img').removeClass('unlike').addClass('like');
			$('.favoris').css({'display':'block'}).fadeOut(1500);
			alsoFav = true;
		}
	});

/*------------------------------------*\
	Vote
\*------------------------------------*/
	var vote_affiche = true;

	// Apparition du vote
	$('#btn_vote').click(function(e) {
		e.preventDefault();

		if(vote_affiche) {
			$('.bg-vote').fadeIn(500);
			$('.product_vote').css({'display':'block'});
			$('.vote').animate({'margin-left':0}, function(){
				vote_affiche = false;
			});
		}
		else {
			$('.bg-vote').fadeOut(500);
			$('.vote').animate({'margin-left':'100%'}, function(){
				$('.product_vote').css({'display':'none'});
				vote_affiche = true;
			});
		}

	});

	// Choix de vote
	$('.smiley li').click(function(e){
		e.preventDefault();

		var vote = $(this).attr('data-vote');

		$('.smiley li').removeClass('active');
		$(this).addClass('active');
		$('.resultats_vote').fadeIn('slow');
		$('.resultats_vote li span').css({'font-size': '40px', 'opacity':0});
		$('.resultats_vote li span').animate({'font-size': '17px', 'opacity':1}, 600);

		registerVote(vote);
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
	$('.btn_suite').click(function(e){
		e.preventDefault();

		var pHeight = $('.description p').height();

		// Quand la description est courte 
		if($(this).hasClass('description_off')) {
			$(this).removeClass('description_off').addClass('description_on');
			$('.text-container').animate({ 'height':pHeight});
		}
		// Quand la description est longue
		else {
			$(this).removeClass('description_on').addClass('description_off');
			$('.text-container').animate({ 'height':70});
		}
	});


});