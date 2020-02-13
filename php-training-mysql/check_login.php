<?php

//Check if credentials are valid


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reunion_island";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


//session_start();

if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}

//var_dump($username);
//var_dump($password);

$recup = "SELECT username, password FROM user WHERE username = '$username' AND password = sha1('$password')";
$requete = $conn->query($recup);

$row = $requete->fetch_assoc();
//echo $row['username'];
if ($row['username'] === $username && ($row['password']) === sha1($password)) {
    //echo 'bravo !';
    session_start();
    $session['username'] = $_POST['username'];
    $session['password'] = $_POST['password'];
    header('location: read.php');
    //header('location: read.php');
} else {
    echo "Erreur";
}