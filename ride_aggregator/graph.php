<?php

class Graph
{
	private $data = [];
	private $visited;
	private	$path;
	private $routes;
	
	public function addLeg($leg)
	{
		$origin = strval($leg->origin);
		$destination = strval($leg->destination);
		
		if (!array_key_exists($origin, $this->data)) {
			$this->data[$origin] = [];
		}
		
		array_push($this->data[$origin], $leg->destination);
	}
	
	public function findPath($origin, $destination, $maxPlaces)
	{
		$origin = strval($origin);
		$destination = strval($destination);
		
		$this->visited = [];
		$this->path = [$origin];
		
		$this->routes = [];
		$this->find($origin, $destination, $maxPlaces);
		
		return $this->routes;
	}
	
	private function find($origin, $destination, $maxPlaces)
	{		
		if (count($this->path) > $maxPlaces) {
			return;
		}
		
		array_push($this->visited, $origin);
		
		if ($origin == $destination) {
			array_push($this->routes, array_values($this->path));
		}
		
		if (array_key_exists($origin, $this->data))
		{
			foreach($this->data[$origin] as $item)
			{
				if (in_array($item, $this->visited)) {
					continue;
				}
				
				array_push($this->path, $item);
				$this->find($item, $destination, $maxPlaces);
				
				$key = array_search($item, $this->path);
				unset($this->path[$key]);
			}
		}			
		
		$key = array_search($origin, $this->visited);	
		unset($this->visited[$key]);
	}
}

?>