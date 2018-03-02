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
    <title>Évènement</title>
</head>
<body>
<?php 
$req = 'SELECT DISTINCT lieu FROM evenement ORDER BY lieu';
$resultat = mysqli_query($connection, $req);
$option = '';
while ($donnees = mysqli_fetch_array($resultat)) {
    $option .= '<option value="'.$donnees['lieu'].'">'.$donnees['lieu'].'</option>';
}
?>
<form action="" method="post">
<section id="even">
<select name="select" id="">
<option value="choix">Toutes les villes</option>
<?php echo $option; ?>
</select>

<button type="submit" value="Filtrer" name="filtre">Filtrer</button>
<?php
// $d = new DateTime();
if (empty($_SESSION['nom'])) {
    header('Location: /login.php');
} elseif (isset($_POST['select']) && ($_POST['select'] !== 'choix')) {
    $select = $_POST['select'];
    $articles = "SELECT * FROM `evenement` WHERE lieu ='".$select."' ORDER BY date DESC";
} else {
    $articles = 'SELECT * FROM `evenement` ORDER BY Date DESC';
}
    $req = mysqli_query($connection, $articles) or die('Erreur SQL !<br />'.$articles.'<br />'.mysqli_error($connection));
    while ($donnees = mysqli_fetch_array($req)) {
        echo "<div id='art'>";
        echo '<img src="'.$donnees['image'].'"height="300px" width="300px">'.'<br/>';
        echo 'Le '.$donnees['date'].'<br/>';
        echo $donnees['titre'].'<br/>';
        echo $donnees['description'].'<br/>';
        // echo 'Créé le : '.$d->format('d-m-Y à H:m:s').'<br/>';
        echo $donnees['creation'].'<br/>';
        echo $donnees['lieu'];
        echo '</div>';
    }
?>
</section>
</form>
</body>
</html>