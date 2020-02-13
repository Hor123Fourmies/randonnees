<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);



session_start();
if(isset($_POST['username'])){
    $session['username'] = $_POST['username'];
}
if(isset($_POST['password'])){
    $session['password'] = $_POST['password'];
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="tres facile">Tres facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="tres difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="number" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="number" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="number" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Ajouter</button>
	</form>
</body>
</html>


<?php

//echo $_POST ['difficulty'];
//$difficulte = $_POST['difficulty'];

if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['difficulty'])){
    $difficulty = $_POST['difficulty'];
}
if(isset($_POST['distance'])){
    $distance = $_POST['distance'];
}
if(isset($_POST['duration'])){
    $duration = $_POST['distance'];
}
if(isset($_POST['height_difference'])){
    $height_difference = $_POST['height_difference'];
}


$stmt = $conn->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (?,?,?,?,?)");

$stmt->bind_param("ssiii", $name, $difficulty, $distance, $duration, $height_difference);


if($stmt->execute()){
    print "La randonnée <span style='font-weight: bold'>$name</span> a été ajoutée.";
}else{
    print $conn->error;
}


//$stmt->execute();

$stmt->close();

?>