<?php
	require "rb-mysql.php";
	
	function connect()
	{
		if (!R::testConnection()) {
			R::setup("mysql:host=localhost;dbname=mad3134_ride","root", "");
		}
	}
	
	function findRoutes($origin, $destination)
	{
		connect();
		$user = R::findAll("legs");
		R::close();
		
		return $user;
	}	
?>