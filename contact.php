<?php
session_start();
include 'utils/bdd.php';
include 'menu.php';
?>
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
    
<section id="contact">
<h2 class="titre">Contact</h2>

<form id="test" method="post" action="">
    <div id="col1">
        <h5>Objet :</h5>
    <input required name="objet" type="text">

    <h5>Message :</h5>
    <textarea required id="message" name="message" cols="30" rows="10"></textarea>

    <select id="thematique" name="thema" required>
    <option value="">Thématique</option>
    <option value="TestA">TestA</option>
    <option value="TestB">TestB</option>
    </select>
    </div>

    <div id="col2">
    <h5>Avez-vous un compte utilisateur?</h5>
    <input type="radio" name="compte" value="oui"required>Oui
    <input type="radio" name="compte" value="non"required>Non

    <h5>Quel est votre âge?</h5>
    <input type="number" name="date" id="date" required>
    <!-- <input type="date" name="date" id="date" required> -->

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
            echo $obj.'<br />';
            echo "votre message:<br /> $mess <br />";
            echo "Vous avez choisi le thème $thema <br /> Vous avez un compte? $oui <br />";
            echo " Vous avez $date ans";

            // Checker la connection
            if ($connection->connect_error) {
                die('Connection failed: '.$connection->connect_error);
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