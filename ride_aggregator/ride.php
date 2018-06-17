
<?php		
	require "database.php";
	require "graph.php";
	
	$legs = findLegs();
	$places = findPlaces();

	// find all routes between two points.
	// the maximum number os places in the route is 4;
	// a leg is valid if its size is less than twice the minimum
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
		
		$routes = validate($routes, $minDist * 2);
		
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
