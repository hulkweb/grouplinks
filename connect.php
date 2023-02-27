<?php 
$db = 'grouplink';
$host = 'localhost';
$username = 'root';
$password = '';

// $db='chhavini_w3rural';
// $host='localhost';
// $username='chhavini_mpbjym';
// $password='StrongP@ssw0rd';

$con = mysqli_connect($host, $username, $password, $db) or die('disconnected');
$pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
