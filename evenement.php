<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Évènement</title>
</head>
<body>
<?php include 'index.php'; ?>
<section id="even">
<?php
if (empty($_SESSION['nom'])) {
    header('Location: /login.php');
} else {
}

    $servername = 'localhost';
    $username = 'root';
    $password = 'simplonco';
    $dbname = 'phptest';
    $d = new DateTime();

    $connection = new mysqli($servername, $username, $password, $dbname);
    $articles = 'SELECT * FROM `evenement` ORDER BY Date DESC ';
    $req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));
    while ($donnees = mysqli_fetch_array($req)) {
        echo "<div id='art'>";
        echo '<img src="'.$donnees['image'].'"height="50%" width="20%">'.'<br/>';
        echo 'Le '.$donnees['date'].'<br/>';
        echo $donnees['titre'].'<br/>';
        echo $donnees['description'].'<br/>';
        echo 'Créé le : '.$d->format('d-m-Y à H:m:s').'<br/>';
        // echo $donnees['creation'].'<br/>';
        echo '</div>';
    }
?>
</section>
</body>
</html>