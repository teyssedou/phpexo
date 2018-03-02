<?php
session_start();
include 'menu.php';
include 'utils/bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Aticle</title>
</head>
<body>
<form action="" method="get">
<?php
    $id = $_GET['id'];
    $articles = "SELECT * FROM `Blog` WHERE id='$id'";
    $req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));
    while ($donnees = mysqli_fetch_array($req)) {
        echo '<img src="'.$donnees['image'].'" height="30%" width="20%">'.'<br/>';
        echo 'Titre:', $donnees['Titre'].'<br/>';
        echo 'Intro :', $donnees['Intro'].'<br/>';
        echo $donnees['Date'].'<br/>';
        echo $donnees['Texte'].'<br/>';
        echo "<a href='blog.php'>Retour</a>";
    }
?>
</form>
</body>
</html>