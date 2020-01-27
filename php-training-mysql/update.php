<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<!--
	<a href="/php-pdo/read.php">Liste des données</a>
-->
<?php

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
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];

$id_randonnee = $_GET['id'];

$id_randonnee_post = $_POST['id'];




/*
if (isset ($id_randonnee_post)){
    $selection = "SELECT * FROM hiking WHERE id = $id_randonnee_post";
    $result = $conn->query($selection);
}
*/

    $update = "UPDATE hiking SET name = '$name', difficulty = '$difficulty', distance = '$distance' , duration = '$duration', height_difference = '$height_difference' WHERE id=$id_randonnee_post";
    echo "<br>";

    $conn->query($update);
    echo $conn->error;


$randonnee = "SELECT * FROM `hiking` WHERE id=$id_randonnee";
$result = $conn->query($randonnee);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
//echo "Nom de la randonnée : " . $row['name'] . "<br>";
//echo "Distance à parcourir : " . $row['distance'] . "<br>";
//echo "Durée de la randonnée : " . $row['duration'] . "<br>";
//echo "<br>";

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
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
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
echo "<br>";
if ($conn->query($update)) {
    print "La randonnée <span style='font-weight: bold'>$name</span> a bien été mise à jour.";
} else {
    print $conn->error;
}
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


