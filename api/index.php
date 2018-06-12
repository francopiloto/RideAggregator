<?php
	// split URL and query parameters
	$request_uri = explode("?", $_SERVER["REQUEST_URI"], 2);

	// routing
	switch ($request_uri[0])
	{			 
		case "/api/ride":
			 require "../ride_aggregator/index.php";
			 break;
		
		default:
			header("HTTP/1.0 404 Not Found");			
			break;
	}
?>