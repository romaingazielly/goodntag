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

	if(pageHeight < 1280) pageHeight = 1280;

	$('.smart_menu').click(function(e) {
        e.preventDefault()
        openMenu();
    });

	var getLocation = function () {
		navigator.geolocation.getCurrentPosition(function (position) {
			var lat = position.coords.latitude;
			var lon = position.coords.longitude;
			console.log(lat, lon);
			var myLatlng = new google.maps.LatLng(lat, lon);
			var marker = new google.maps.Marker({
			      position: myLatlng,
			      map: mapmap,
			      title: 'Ma position'
			  });

			// mapmap.setCenter(myLatlng)
		});
	};
	getLocation();

});

var smartMenuShowing = false;
var pageHeight = $('.contenu').height();


function openMenu(){
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
}

$(document).ready(function(){
	var login = $('.menu .flip').attr('data-log');
	if(login == 0){
		$('.menu .flip').addClass('failed');
		openMenu();
	}else{
		if($('.menu .flip').hasClass('failed')){
			$('.menu .flip').removeClass('failed');
		}
	}

	// Placeholder
	$('#user_login').attr('placeholder', 'Identifiant');
	$('#user_pass').attr('placeholder', '*******');
});

