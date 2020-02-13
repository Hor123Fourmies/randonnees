<link rel="stylesheet" href="basics.css">

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
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      <!-- Afficher la liste des randonnées -->
        <?php

                $randonnees = "SELECT * FROM hiking WHERE 1";
                $result = $conn->query($randonnees);
                echo $conn->error;

        ?>
                        <tr>
                            <th scope="col">Nom de la randonnée</th>
                            <th scope="col">Difficulté</th>
                            <th scope="col">Distance</th>
                            <th scope="col">Durée</th>
                            <th scope="col">Dénivelé</th>
                        </tr>
        <?php

                    while ($row = $result->fetch_assoc()) {

                        ?>

                        <tr>
                            <td>
                                <?php
                                $id_randonnee = $row['id'];
                                "<input type = hidden >";
                                echo "<a href = 'update.php?id=$id_randonnee'>" .utf8_encode($row['name']) . "</a>". "<br>";?>
                            </td>
                            <td>
                                <?php echo utf8_encode($row['difficulty']) . "<br>";?>
                            </td>
                            <td>
                                <?php echo $row['distance'] . "<br>";?>
                            </td>
                            <td>
                                <?php echo $row['duration'] . "<br>";?>
                            </td>
                            <td>
                                <?php echo $row['height_difference'] . "<br>";?>
                            </td>
                            <td>
                                <?php $id_randonnee = $row['id'];
                                echo "<button type=\"submit\" name=\"button\" style = \"background: #f5f5a6; color:orange\"><a href = 'delete.php?id=$id_randonnee'>Supprimer</a></button>";
                                echo "<br>";
                                ?>
                            </td>
                        </tr>
                            <?php
                    }
?>
    </table>

    <form action="create.php" method="post">
        <button type="submit" name="button" style="background: green; color: white">Ajouter une randonnée</button>
    </form>


    <form action="logout.php" method="post">
        <button type="submit" name="button" style="background: red; color: white">Se déconnecter</button>
    </form>

  </body>
</html>

