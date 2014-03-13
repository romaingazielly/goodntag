// DOM Ready
$(function() {

	// SVG fallback
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
	if (!Modernizr.svg) {
		var imgs = document.getElementsByTagName('img');
		for (var i = 0; i < imgs.length; i++) {
			if (/.*\.svg$/.test(imgs[i].src)) {
				imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
			}
		}
	}

	// Menu
	var smartMenuShowing = false;
	var pageHeight = $('.contenu').height();

	$('.smart_menu').click(function(e) {
        e.preventDefault()
        $('.menu').css({'height':pageHeight});

        if (smartMenuShowing) {

            // Décalage de la page
            $('.contenu, header').animate({ left: '0px' }, 400, function(){
                //$('.container').css({'overflow':'hidden'});
            });
            smartMenuShowing = false;

        } else {

            // Décalage de la page
            $('.contenu, header').animate({ left: '260px' }, 400);
            smartMenuShowing = true;  

        }
    });

});



