<?php
	require "rb-mysql.php";
	
	function connect()
	{
		if (!R::testConnection()) {
			R::setup("mysql:host=localhost;dbname=mad3134_ride","root", "");
		}
	}
	
	function findPlaces()
	{
		connect();		
		$places = R::findAll("places");
		R::close();
		
		return $places;
	}
	
	function loadPlace($id) 
	{
		connect();		
		$place = R::findOne("places","id=?",[$id]);
		R::close();
		
		return $place;
	}
	
	function findLegs()
	{
		connect();
		$legs = R::findAll("legs");
		R::close();
		
		return $legs;
	}	
?>