<?php
$db = 'grouplink';
$host = 'localhost';
$username = 'root';
$password = '';

// $db='u934617904_pawari';
// $host='localhost';
// $username='u934617904_pawari';
// $password='P@ssw0rd';

$con = mysqli_connect($host, $username, $password, $db) or die('disconnected');
$pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
