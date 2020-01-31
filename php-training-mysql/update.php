<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

/*
$id_randonnee = $_GET['id'];

$name = $_GET['name'];
$difficulty = $_GET['difficulty'];
$distance = $_GET['distance'];
$duration = $_GET['duration'];
$height_difference = $_GET['height_difference'];


$randonnee = "SELECT * FROM `hiking` WHERE id=$id_randonnee";
$result = $conn->query($randonnee);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
    echo "ID de la randonnée : " . $row['id'] . "<br>";
    echo "Nom de la randonnée : " . $row['name'] . "<br>";
    echo "Distance à parcourir : " . $row['distance'] . "<br>";
    echo "Durée de la randonnée : " . $row['duration'] . "<br>";
    echo "<br>";
}
*/



?>

<?php


$name = $_POST['name'];
$difficulty = utf8_decode($_POST['difficulty']);
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];

$id_randonnee = $_GET['id'];

$id_randonnee_post = $_POST['id'];

if(empty($name)) {
    echo 'La variable $name existe !';
} else {
    echo 'La variable $name n\'existe pas...';
}


/*
if (isset($name) && isset($difficulty) && isset($distance) && isset($duration) && isset ($height_difference)){
}

if (!empty($name) && !empty($difficulty) && !empty($distance) && !empty($duration) && !empty($height_difference)){
}
*/

/*
if (isset ($id_randonnee_post)){
    $selection = "SELECT * FROM hiking WHERE id = $id_randonnee_post";
    $result = $conn->query($selection);
}
*/

$randonnee = "SELECT * FROM `hiking` WHERE id=$id_randonnee";
$result = $conn->query($randonnee);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
//echo "Nom de la randonnée : " . $row['name'] . "<br>";
//echo "Distance à parcourir : " . $row['distance'] . "<br>";
//echo "Durée de la randonnée : " . $row['duration'] . "<br>";
//echo "<br>";

echo "<br><br>";

?>


<a href="read.php">Liste des données</a>

<h1>Modifier</h1>
<form action="" method="post">
    <div>
        <input type="hidden" name="id" value="<?php echo $id_randonnee; ?>">
    </div>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $row['name'] ?>">
    </div>

    <div>
        <label for="difficulty">Difficulté</label>
        <select name="difficulty">
            <option value="tres facile"<?php if (utf8_decode($row['difficulty']) === 'tres facile') { echo "selected = 'selected'";}?>>Tres facile</option>
            <option value="facile"<?php if (utf8_decode($row['difficulty']) === 'facile') { echo "selected = 'selected'";} ?>>Facile</option>
            <option value="moyen"<?php if (utf8_decode($row['difficulty']) === 'moyen') { echo "selected = 'selected'";} ?>>Moyen</option>
            <option value="difficile"<?php if (utf8_decode($row['difficulty']) === 'difficile') { echo "selected = 'selected'";} ?>>Difficile</option>
            <option value="tres difficile"<?php if (utf8_decode($row['difficulty']) === 'tres difficile') {echo "selected = 'selected'";}?>>Tres difficile</option>
        </select>
    </div>

    <div>
        <label for="distance">Distance</label>
        <input type="text" name="distance" value="<?php echo $row['distance'] ?>">
    </div>
    <div>
        <label for="duration">Durée</label>
        <input type="duration" name="duration" value="<?php echo $row['duration'] ?>">
    </div>
    <div>
        <label for="height_difference">Dénivelé</label>
        <input type="text" name="height_difference" value="<?php echo $row['height_difference'] ?>">
    </div>
    <button type="submit" name="button">Mettre à jour</button>
</form>
</body>
</html>


<?php
}

$update = "UPDATE hiking SET name = '$name', difficulty = '$difficulty', distance = '$distance' , duration = '$duration', height_difference = '$height_difference' WHERE id=$id_randonnee_post";

$conn->query($update);
echo $conn->error;

echo "<br><br>";


if ($conn->query($update)) {
    print "La randonnée <span style='font-weight: bold'>$name</span> a bien été mise à jour.";
} else {
    print $conn->error;
}




/*

$update = "UPDATE hiking SET (name = '$name', difficulty = '$difficulty', distance = '$distance' , duration = '$duration', height_difference = '$height_difference') WHERE id=$id_randonnee)";
echo "<br>";

if (mysqli_query($conn, $update)) {
echo "La modification a bien été effectuée";
} else {
echo "Erreur de mise à jour : " . mysqli_error($conn);
}

mysqli_close($conn);
*/

?>


