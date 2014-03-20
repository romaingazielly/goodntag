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

	$map->generate();

	return $map->getGoogleMap();
}


function get_coords($address)
{
	$map = new GoogleMapAPI();
	$geo = $map->geocoding($address);
	$place_lat = $geo[2];
	$place_lon = $geo[3];

	return array($place_lat, $place_lon);
}

function getCoordinatesFromAddress($address) {

	$url = 'http://maps.google.com/maps/api/geocode/json?address='.str_replace(' ', '+', $address).'&sensor=false';

	$ch = curl_init();
		// Disable SSL verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL, $url);
	// Execute
	$result = curl_exec($ch);

	$jsonData = json_decode($result, true);

	return $jsonData['results'][0]['geometry']['location'];
}