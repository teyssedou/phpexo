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
    <title>Blog</title>
</head>
<body>
<section id="blog">
<form action="" method="post">
<section id="even">
<select name="select" id="">
<option value="decroissant">Choix par ordre décroissant</option>
<option value="croissant">Choix par ordre croissant</option>
</select>
<button type="submit" value="Filtrer" name="filtre">Filtrer</button>
<?php

$requete1 = 'SELECT * FROM Blog';
$resultat1 = mysqli_query($connection, $requete1) or die('Erreur SQL !<br />'.$requete1.'<br />'.mysqli_error($connection));

$nbligne = $resultat1->num_rows;

$nombreDePages = ceil($nbligne / 5);
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
for ($i = 1; $i <= $nombreDePages; ++$i) {
    echo '<a href="blog.php?page='.$i.'">'.$i.'</a> ';
}

if (isset($_GET['page'])) {
    $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
} else { // La variable n'existe pas, c'est la première fois qu'on charge la page
    $page = 1; // On se met sur la page 1 (par défaut)
}
// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
$premierMessageAafficher = ($page - 1) * 5;
$requete3 = "SELECT * FROM Blog LIMIT 5 OFFSET $premierMessageAafficher";
$req1 = mysqli_query($connection, $requete3);

if (isset($_POST['select']) && ($_POST['select'] === 'decroissant')) {
    $select = $_POST['select'];
    $articles = "SELECT * FROM `Blog` ORDER BY Date DESC LIMIT 5 OFFSET $premierMessageAafficher";
} else {
    $articles = "SELECT * FROM `Blog` ORDER BY Date LIMIT 5 OFFSET $premierMessageAafficher";
}
        $req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));
        while ($donnees = mysqli_fetch_array($req)) {
            echo '<a href="article.php?id='.$donnees['id'].'"><img src="'.$donnees['image'].'" height="150px" width="300px"></a>'.'<br/>';
            echo 'Titre:', $donnees['Titre'].'<br/>';
            echo $donnees['Intro'].'<br/>';
            echo $donnees['Date'].'<br/>';
        }

    ?>
</section>
</form>
</body>
</html>