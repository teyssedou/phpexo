
<?php
 $servername = 'localhost';
 $username = 'root';
 $password = 'simplonco';
 $dbname = 'phptest';

 $connection = new mysqli($servername, $username, $password, $dbname);

 $connection->set_charset('utf8');
?>
