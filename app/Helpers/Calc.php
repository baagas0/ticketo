<?php
namespace App\Helpers;
use App\Transportation;
use App\Airport;

class Calc
{
	// Calculate Price
	public static function price($data= []){
		// dd($data->from);
		$from = Airport::findOrFail($data['from']);
		$destination = Airport::findOrFail($data['destination']);

		// from
		$latitudefrom 	= $from->_geolocLat;
		$longitudefrom 	= $from->_geolocLng;


        // destination
		$latitudeto 	= $destination->_geolocLat;
		$longitudeto 	= $destination->_geolocLng;



		$theta = $longitudefrom - $longitudeto;

		$dist = sin(deg2rad($latitudefrom)) * sin(deg2rad($latitudeto)) + cos(deg2rad($latitudefrom)) * cos(deg2rad($latitudeto)) * cos(deg2rad($theta));

		$dist = acos($dist);

		$dist = rad2deg($dist);

		$miles = $dist * 60 * 1.1515;
		$distance = ($miles * 1.609344);

		$transportation = Transportation::findOrFail($data['idTransportation']);

		$economy_price 		= ($distance * $transportation->economy_price);
		$bussiness_price 	= ($distance * $transportation->bussiness_price);
		$first_price 		= ($distance * $transportation->first_price);

		$response = [
			'distance'			=> $distance." km",
			'economy_price'		=> $economy_price,
			'bussiness_price'	=> $bussiness_price,
			'first_price'		=> $first_price,
		];

		return $response;
	}
}