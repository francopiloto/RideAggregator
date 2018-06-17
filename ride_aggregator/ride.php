
<?php		
	require "database.php";
	require "graph.php";
	require 'vendor/autoload.php';
    use GuzzleHttp\Client;
	
	$legs = findLegs();
	$places = findPlaces();

	// find all routes between two points.
	// the maximum number os places in the route is 4;
	// a leg is valid if its size is less than 1.5x the minimum
	// distance between origin and destination
	function findRoutes($origin, $destination)
	{	
		global $legs;
		$graph = new Graph();
	
		foreach ($legs as $leg) {
			$graph->addLeg($leg);				
		}
		
		$routes = $graph->findPath($origin, $destination, 4);
		
		$p1 = getPlace($origin);
		$p2 = getPlace($destination);
		$minDist = distance($p1, $p2);
		
		$routes = validate($routes, $minDist * 1.5);
		
		usort($routes, function($a, $b) {
			return count($a) - count($b);
		});

		return $routes;		
	}
	
	function validate($routes, $maxDistance)
	{	
		$add = [];
			
		foreach ($routes as $route)
		{
			if (count($add) > 4) {
				break;
			}
			
			$distance = 0;
			
			for ($i = 1; $i < count($route); $i++)
			{
				$p1 = getPlace($route[$i-1]);
				$p2 = getPlace($route[$i]);
				
				$distance += distance($p1, $p2);
			}
			
			if ($distance < $maxDistance) {
				array_push($add, $route);		
			}
		}
		
		return $add;
	}
	
	function setUberPrice($p1,$p2,&$leg)
	{
		$client = new Client();
		
		$request_url = "https://sandbox-api.uber.com/v1.2/estimates/price?server_token=" .
		               "Olwm8Ek2QqpqBGuy4FaEghoSDzVEGFP33D4eRfAg" .
					   "&start_latitude="  . $p1->latitude  .
					   "&start_longitude=" . $p1->longitude . 
					   "&end_latitude="    . $p2->latitude  .
					   "&end_longitude="   . $p2->longitude;
					   
		$response = $client->get($request_url);
		$body = $response->getBody()->getContents();
		$data = json_decode($body, true);
		
		$leg->provider = $data["prices"][0]["display_name"];
		$leg->price = $data["prices"][0]["estimate"];
	}
	
	function getPlace($id)
	{
		global $places;
		
		foreach ($places as $place)
		{
			if ($place->id == $id) {
				return $place;
			}
		}
	}
	
	function getLeg($origin, $destination)
	{
		global $legs;
		
		foreach ($legs as $leg)
		{
			if ($leg->origin == $origin && $leg->destination == $destination) {
				return $leg;
			}
		}
	}
	
	function distance($p1, $p2)
	{
		$r = 6371e3; // metres
		$f1 = deg2rad($p1->latitude);
		$f2 = deg2rad($p2->latitude);
		$d1 = deg2rad($p2->latitude - $p1->latitude);
		$d2 = deg2rad($p2->longitude - $p1->longitude);
		
		$a = sin($d1/2) * sin($d1/2) + cos($f1) * cos($f2) * sin($d2/2) * sin($d2/2);
		$c = 2 * atan2(sqrt($a), sqrt(1-$a));

		return $r * $c;
	}
?>
