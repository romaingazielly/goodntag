<?php 


// include Gmaps API
require_once('gmaps-api/GoogleMapsAPI.php');



function generate_map($lat, $lon, $address)
{

	$map = new GoogleMapAPI();

	$map->setDivId('map');
	$map->setCenterLatLng($lat, $lon);
	$map->setEnableWindowZoom(true);
	$map->setSize('600px','600px');
	$map->setZoom(11);
	$map->setLang('fr');

	$map->addMarkerByCoords($lat, $lon, $address, $address);

	$map->generate();

	return $map->getGoogleMap();
}


function generate_map_all($lats, $lons, $addresses, $names)
{
	$map = new GoogleMapAPI();

	$map->setDivId('map');
	$map->setEnableWindowZoom(true);
	$map->setSize('100%','320px');
	$map->setZoom(12);
	$map->setLang('fr');

	$i = 0;
	foreach($addresses as $address) {
		$map->addMarkerByCoords($lats[$i], $lons[$i], $address, '<b>'.$names[$i].'</b><br />'.$address, $names[$i].'<br />'.$address);
		$i++;
	}
	// var_dump($map); die();
	$map->generate();

	return $map->getGoogleMap();
}


function get_coords($address)
{
	$map = new GoogleMapAPI();
	$geo = $map->geocoding($address);
	$place_lat = $geo[2];
	$place_lon = $geo[3];

	return array('lat' => $place_lat, 'lng' => $place_lon);
}

function getCoordinatesFromAddress($address) {

	$url = 'http://maps.google.com/maps/api/geocode/json?address='.str_replace(' ', '+', $address).'&sensor=false';
	$ch = curl_init();
		// Disable SSL verification
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Will return the response, if false it print the response
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// Execute
	$result = curl_exec($ch);
	// var_dump($result); die();

	$jsonData = json_decode($result, true);

	return $jsonData['results'][0]['geometry']['location'];
}