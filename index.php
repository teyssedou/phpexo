<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>PHP</title>
</head>
<body>
 <ul id="menu">
 <li><a href="home.php">Home</a></li>
 <li><a href="apropos.php">A Propos</a></li>
 <li><a href="evenement.php">Évènement</a></li>
 <li><a href="blog.php">Blog</a></li>
 <li><a href="login.php">Login</a></li>
 <li><a href="contact.php">Contact</a></li>
 <li>

 <?php
 if (!empty($_SESSION['nom'])) {
     echo 'Bonjour : '.$_SESSION['nom']; ?>
<li><a href="deconnection.php">Déconnexion</a>
</li>
<!-- <form method="post" action="deconnection.php">
      <input type="submit" name="exit" value="Déconnexion" /> 
</form> -->
      
<?php
 }
?>
</li>
 </ul>
</body>
</html>