<?php 
// here i connect to the database that I have created
$server = 'nadinesusannaronnby.dk.mysql';
$username = 'nadinesusannaronnby_dk_nadinio';
$password = 'nadinio';
$database = 'nadinesusannaronnby_dk_nadinio';


//if connection fails the script will stop and a message will appear
try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    
} catch(PDOException $e){
    die( "Connection failed: " . $e->getMessage());
}

