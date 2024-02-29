<?php

// create a script that will create the database tables

$dbhost = 'localhost';
$dbuser = 'kostas';
$dbpass = 'kostasgr57';
$dbname = 'cardb';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($mysqli->connect_error ) {
   printf("Connect failed: %s<br />", $mysqli->connect_error);
   exit();
}
printf('Connected successfully.<br />');

if ($mysqli->query("CREATE DATABASE IF NOT EXISTS cardb")) {
   printf("Database cardb created successfully.<br />");
}
if ($mysqli->error) {
   printf("Could not create database: %s<br />", $mysqli->error);
}

$sql = "CREATE TABLE car(
   id INT AUTO_INCREMENT PRIMARY KEY,
   company VARCHAR(30) NOT NULL,
   model VARCHAR(30) NOT NULL,
   year VARCHAR(50),
  color VARCHAR(40))";


         if ($mysqli->query($sql)) {
            printf("Table car created successfully.<br />");
         }
         if ($mysqli->error) {
            printf("Could not create table: %s<br />", $mysqli->error);
         }

$mysqli->close();

?>