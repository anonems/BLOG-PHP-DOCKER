<!-- cette page permet de se connecter à la base de donnée -->
<?php
$engine = "mysql";
$host = "db";
$port = 3306;
$dbName = "blog";
$username = "root";
$password = "password";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$query = $pdo->prepare();  = prevention a l'injection sql
//faille xss, = injection js
?>