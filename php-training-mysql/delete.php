<body>

<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">

<?php
/**** Supprimer une randonnée ****/


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


session_start();
$session['username'] = $_POST['username'];
$session['password'] = $_POST['password'];


$id_randonnee = $_GET['id'];

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

echo "<br>";

$rando = "SELECT * FROM `hiking` WHERE id=$id_randonnee";
$result = $conn->query($rando);
echo $conn->error;

while ($row = $result->fetch_assoc()) {
    echo "ID de la randonnée : " . $row['id'] . "<br>";
    echo "Nom de la randonnée : " .utf8_encode($row['name']) . "<br>";
    echo "Distance à parcourir : " . $row['distance'] . "<br>";
    echo "Durée de la randonnée : " . $row['duration'] . "<br>";
    echo "<br>";

}

$supprime = "DELETE FROM `hiking` WHERE id=$id_randonnee";
$result = $conn->query($supprime);
echo $conn->error;


echo "<br>";
if ($conn->query($supprime)) {
    print "La randonnée <span style='font-weight: bold'>$name</span> a bien été supprimée.";
} else {
    print $conn->error;
}

header ('location: read.php');

?>

</body>

