<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
<?php include 'index.php'; ?>
<section id="blog">
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'simplonco';
    $dbname = 'phptest';
        $connection = new mysqli($servername, $username, $password, $dbname);
        $articles = 'SELECT Titre,image,Intro,Date FROM `Blog` ORDER BY Date DESC';
        $req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));
        while ($donnees = mysqli_fetch_array($req)) {
            echo '<img src="'.$donnees['image'].'" height="20%" width="20%">'.'<br/>';
            echo 'Titre:', $donnees['Titre'].'<br/>';
            echo 'Intro :', $donnees['Intro'].'<br/>';
            echo $donnees['Date'].'<br/>';
        }
?>
</section>
</body>
</html>