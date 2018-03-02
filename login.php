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
    <title>Login</title>
</head>
<body>

<h2>Inscrivez-vous</h2>

<form id="account" method="post" action="">
<input type="text" name="username" id="user" placeholder="Username">

<input type="password" name="password1" id="mdp" placeholder="Mot de Passe">
<input type="password" name="password2" id="mdp" placeholder="Confirmer votre Mot de Passe">

<button type="submit">Sauvegarder</button>

<?php
if (!empty($_POST['username'])) {
    $user = $_POST['username'];
    $mdp1 = $_POST['password1'];
    $mdp2 = $_POST['password2'];
    $cachemdp = hash('sha512', $_POST['password1']); //masque le mot de passe

    $requete = "SELECT username FROM account WHERE username='$user'";
    $resultat = mysqli_query($connection, $requete) or die('Erreur SQL !<br />'.$requete.'<br />'.mysqli_error($connection));

    if ($resultat->num_rows) {
        echo 'Nom déjà existant';
    } elseif ($mdp1 !== $mdp2) {
        echo 'Mot de Passe différent'; //erreur si mot de passe different
    } else {
        //envoi les infos sur la BDD
        if ($connection->connect_error) {
            die('Connection failed: '.$connection->connect_error);
        }
        $requete = "INSERT INTO account VALUES(NULL, '$user', '$cachemdp')";
        $resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '.$requete.mysqli_error($connection));
        echo 'Votre inscription a bien été prise en compte';
    }
}
?>
</form>

<form id="login" method="post" action="">
<h2>Connectez-vous</h2>
<input type="text" name="name" id="user" placeholder="Username">

<input type="password" name="pass" id="mdp" placeholder="Mot de Passe">

<button type="submit">Connexion</button>

<?php
if (!empty($_POST['name'])) {
    $nom = $_POST['name'];
    $pass = $_POST['pass'];
    $cachemdp2 = hash('sha512', $_POST['pass']); //masque le mot de passe

    $requete1 = "SELECT * FROM account WHERE username='$nom' AND motdepasse='$cachemdp2'";
    $resultat1 = mysqli_query($connection, $requete1) or die('Erreur SQL !<br />'.$requete1.'<br />'.mysqli_error($connection));

    if (($resultat1->num_rows)) {
        header('Location: /index.php');
        $_SESSION['nom'] = $nom;
    } else {
        echo'Identifiant / Mot de passe incorect';
    }
}
?>
</form>
</body>
</html>