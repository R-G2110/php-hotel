<?php 

	$hotels = [
		[
			'name' => 'Hotel Belvedere',
			'description' => 'Hotel Belvedere Descrizione',
			'parking' => true,
			'vote' => 4,
			'distance_to_center' => 10.4
		],
		[
			'name' => 'Hotel Futuro',
			'description' => 'Hotel Futuro Descrizione',
			'parking' => true,
			'vote' => 2,
			'distance_to_center' => 2
		],
		[
			'name' => 'Hotel Rivamare',
			'description' => 'Hotel Rivamare Descrizione',
			'parking' => false,
			'vote' => 1,
			'distance_to_center' => 1
		],
		[
			'name' => 'Hotel Bellavista',
			'description' => 'Hotel Bellavista Descrizione',
			'parking' => false,
			'vote' => 5,
			'distance_to_center' => 5.5
		],
		[
			'name' => 'Hotel Milano',
			'description' => 'Hotel Milano Descrizione',
			'parking' => true,
			'vote' => 2,
			'distance_to_center' => 50
		],
	];

	$rating = isset($_GET['rating_filter']) ? $_GET['rating_filter'] : 0;
	

	$filteredHotels = [];
	
	if(isset($_GET['parking_filter'])){
		foreach($hotels as $hotel){
			if($hotel['parking'] && $hotel['vote'] >= $rating){
				$filteredHotels[] = $hotel;
			}
		}
	}else{
		foreach($hotels as $hotel){
			if($hotel['vote'] >= $rating){
				$filteredHotels[] = $hotel;
			}
		}
	}


		

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CDN Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<title>PHP Hotel</title>
</head>
<body>
	<div class="container my-5">

		<div class="query-bar">
			<form action="index.php" method="GET" class="d-flex">
				
				
				<div class=" mx-3 col-2 ">
					<select @ class="form-select" id="rating_filter" name="rating_filter" >
						<option selected  value="0">Rating filter</option>
  			    <option value="1">1 star</option>
  			    <option value="2">2 stars</option>
  			    <option value="3">3 stars</option>
  			    <option value="4">4 stars</option>
  			    <option value="5">5 stars</option>
  			  </select>
				</div>
				<div class="col-auto">
					<input type="checkbox" class="form-check-input" name="parking_filter" id="parking_filter">
					<label class="form-check-label" for="parking">
						solo hotel con parcheggio
					</label>
				</div>
				<div class="col-auto mx-4 ">
					<button class="btn btn-outline-dark ">Filtra</button>
				</div>
			</form>
		</div>

		
		<table class="table my-5">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Descrizione</th>
					<th scope="col">Parcheggio</th>
					<th scope="col">Voto</th>
					<th scope="col">Distanza dal centro</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($filteredHotels as $hotel): ?>
				<tr>
						<td><?php echo $hotel['name'] ?></td>
						<td><?php echo $hotel['description'] ?></td>
						<td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
						<td><?php echo $hotel['vote'] ?></td>
						<td><?php echo $hotel['distance_to_center'] ?>km</td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

		

	</div>
</body>
</html>