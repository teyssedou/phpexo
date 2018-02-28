<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Contact</title>
</head>
<body>
    <?php include 'index.php'; ?>
    
<section id="contact">
<h2 class="titre">Contact</h2>

<form id="test" method="post" action="">
<div id="col1">
    <h5>Objet :</h5>
<input required ="text" name="objet" type="text">

<h5>Message :</h5>
<textarea required="textarea" id="mesage" name="message" cols="30" rows="10"></textarea>

<select id="thematique" name="thema">
<option value="0" selected>Thématique</option>
<option value="TestA">TestA</option>
<option value="TestB">TestB</option>
</select>
</div>
<div id="col2">
<h5>Avez-vous un compte utilisateur?</h5>
<input type="radio" name="compte" value="oui">Oui
<input type="radio" name="compte" value="non">Non

<h5>Date de Naissance</h5>
<input type="date" name="date" id="date">

<?php
if (!empty($_POST)) {
    $obj = $_POST['objet'];
    $mess = $_POST['message'];
    $thema = $_POST['thema'];
    $oui = $_POST['compte'];
    $date = $_POST['date'];
    $pos = stripos($obj, 'simplon');
    if ($pos !== false) {
        echo "Simplon n'est pas autorisé!";
    } else {
        echo '<h5>Votre Message :</h5>';
        echo $obj;
        echo" votre message: $mess <br />";
        echo "Vous avez choisi le thème $thema <br /> Vous avez un compte? $oui <br />";
        echo " Votre date de naissance est le $date";

        $servername = 'localhost';
        $username = 'root';
        $password = 'simplonco';
        $dbname = 'phptest';
        //variables pour récupérer les données
        // Créer la connection
        $connection = new mysqli($servername, $username, $password, $dbname);
        // Checker la connection
        if ($conn->connect_error) {
            die('Connection failed: '.$conn->connect_error);
        }
        //on fait notre requète
        $requete = "INSERT INTO Contact VALUES(NULL, '$obj', '$mess', '$thema', '$oui', '$date')";
        $resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '.$requete.mysqli_error($connection));
    }
}
?>
<button type="reset">Effacer</button>
<button type="submit">OK</button>
</div>
</form>
</section>
</body>
</html>