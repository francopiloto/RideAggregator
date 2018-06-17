<?php
	require "ride.php";
	
	$request_uri = explode("?", $_SERVER["REQUEST_URI"], 2);
	
	if (count($request_uri) < 2)
	{
		echo "Usage: <br>";
		echo "'api/ride?places' to get a list of places <br>";
		echo "'api/ride?origin=origin_id&destination=destination_id' to get the routes";
		
		return;
	}
	
	$queries = array();
	parse_str($request_uri[1], $queries);
	
	// query string parsing and error checking
	if (array_key_exists("places", $queries)) {
		$response = json_encode($places);
	}
	else if (array_key_exists("origin", $queries) && array_key_exists("destination", $queries))
	{
		$routes = buildRoutes($queries["origin"], $queries["destination"]);
		
		if ($routes) {
			$response = json_encode($routes);
		}
		else 
		{
			$errMsg = array("error" => "no route found");
			$response = json_encode($errMsg);
		}
	}
	else
	{
		$errMsg = array("error" => "invalid query");
		$response = json_encode($errMsg);
	}
	
	header("Content-Type: application/json");
	
	if ($response === false)
	{
		$errMsg = array("error" => json_last_error_msg());
		$response = json_encode($errMsg);
		
		http_response_code(500);
	}
	
	echo $response;
	
	function buildRoutes($origin, $destination)
	{
		global $legs;
		$routes = findRoutes($origin, $destination);
		
		if (!$routes) {
			return null;
		}
		
		$response = [];
		
		foreach ($routes as $route)
		{
			$p1 = getPlace($route[0]);
			$p2 = getPlace($route[1]);
			$leg = getLeg($route[0], $route[1]);
			
			$path = array();
			
			$obj = array 
			(
				"p1" => $p1->name,
				"p2" => $p2->name,
				"price" => $leg->price,
				"provider" => $leg->provider,
			);
			
			array_push($path, $obj);
				
			for ($i = 2; $i < count($route); $i++)
			{	
				$p1 = $p2;
				$p2 = getPlace($route[$i]);
				$leg = getLeg($route[$i-1], $route[$i]);
				
				$obj = array 
				(
					"p1" => $p1->name,
					"p2" => $p2->name,
					"price" => $leg->price,
					"provider" => $leg->provider,
				);
				
				array_push($path, $obj);
			}

			array_push($response, $path);			
		}
		
		return $response;
	}
?>