<ul id="menu">
 <li><a href="index.php">Home</a></li>
 <li><a href="apropos.php">A Propos</a></li>
 <li><a href="evenement.php">Évènement</a></li>
 <li><a href="blog.php">Blog</a></li>
 
 <li><a href="contact.php">Contact</a></li>
 <?php
 if (!empty($_SESSION['nom'])) {
     echo 'Bonjour : '.$_SESSION['nom']; ?>
<li><a href="deconnection.php">Déconnexion</a></li>
<li><a href="creation.php">Ajout</a></li>
<?php
 }
?>
<?php
if (empty($_SESSION['nom'])) {
    ?>
<li><a href="login.php">Login</a></li>
<?php
}
?>
</ul>