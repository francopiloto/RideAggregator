<?php
	
	require "ride.php";
	
	$routes;	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$origin = $_POST["origin"];
		$destination = $_POST["destination"];
		
		if ($origin != $destination) {
			$routes = findRoutes($origin, $destination);
		}
	}	
	
	function loadPlaces()
	{
		global $places;
		
		foreach ($places as $place) {
			echo "<option value='" . $place->id . "'>" . $place->name . "</option>";
		}	
	}
	
	function showRoutes()
	{
		global $routes;
		global $legs;
		
		if ($routes)
		{
			foreach ($routes as $route)
			{
				$p1 = getPlace($route[0]);
				$p2 = getPlace($route[1]);
				$leg = getLeg($route[0], $route[1]);
				
				if ($leg->provider == "0") {
					setUberPrice($p1,$p2,$leg);
				}
				
				echo "<div class='box'>";
					echo "<div class='leg'>";
						echo "<div>";
							echo "<span class='place'>" . $p1->name . "</span>";
							echo "<span class='separator'>----------------</span>";
							echo "<span class='place'>" . $p2->name . "</span>";
						echo "</div>";
						echo "<span class='price'>$ " . $leg->price . "/" . $leg->provider . "</span>";
					echo "</div>";
					
					for ($i = 2; $i < count($route); $i++)
					{						
						$p2 = getPlace($route[$i]);
						$leg = getLeg($route[$i-1], $route[$i]);
						
						if ($leg->provider == "0") {
							setUberPrice($p1,$p2,$leg);
						}
				
						echo "<div class='legx'>";
							echo "<div>";	
								echo "<span class='separator'>----------------</span>";
								echo "<span class='place'>" . $p2->name . "</span>";
							echo "</div>";
							echo "<span class='price'>$ " . $leg->price . "/" . $leg->provider . "</span>";
						echo "</div>";
					}			
					
				echo "</div>";
			}
		}	
	}
?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ride Aggregator</title>
	<link type='text/css' rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
	<link type='text/css' rel='stylesheet' href='index.css'>
</head>
<body>
	<div class="container box" style="margin-top:30px;">
		<h1 class="title is-3">Ride Aggregator</h1>
		<form action="index.php" method="POST">		
			<div class="field">
				<label class="label">Origin</label>
				<div class="control">
					<div class="select is-primary">
						<select name="origin">
							<?php loadPlaces(); ?>
						</select>								
					</div>
				</div>
			</div>				
			<div class="field">				
				<label class="label">Destination</label>				
				<div class="control">
					<div class="select is-primary">
						<select name="destination">
							<?php loadPlaces(); ?>
						</select>
					</div>
				</div>
			</div>			
			<button type="submit" class="button is-success">Find</button>
		</form>
	</div>
	<div class="container">
		<?php showRoutes(); ?>
	</div>
</body>
</html>