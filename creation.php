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
    <title>Création</title>
</head>
<body>
<form action="" method="post">
<h2>Création</h2>
<input type="radio" name="rubrique" value="blog" required>Blog
<input type="radio" name="rubrique" value="evenement" required>Évènement

<input type="submit" value="Go">
</form>

<?php
    if (!empty($_POST['rubrique'])) {
        if (($_POST['rubrique']) === 'blog') {
            ?>

<form method="post">
    <h2>Création d'un nouvel article de Blog</h2>
    <h5>Titre :</h5>
    <input required name="title" type="text">
    
    <h5>Image :</h5>
    <input type="url" name="img" placeholder="Lien URL">
   
    <h5>Intro :</h5>
    <input type="text" name="intro" required>
    
    <h5>Description :</h5>
    <textarea required id="message" name="descri" cols="30" rows="10"></textarea>
    
    <h5>Date :</h5>
    <input type="date" name="date" id="" required>

    <input type="submit" value="Créer">
    <?php
        }
    }
?>
    <?php
    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $img = $_POST['img'];
        $intro = $_POST['intro'];
        $descri = $_POST['descri'];
        $date = $_POST['date'];

        echo 'Votre article a été bien ajouté';

        // Checker la connection
        if ($connection->connect_error) {
            die('Connection failed: '.$connection->connect_error);
        }
        //on fait notre requète
        $requete = "INSERT INTO Blog VALUES(NULL, '$title', '$img', '$intro', '$descri', '$date')";
        $resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '.$requete.mysqli_error($connection));
    } ?>

</form>
</body>
</html>