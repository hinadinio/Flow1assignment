<?php
// session start is an indicator of the log in session 
session_start();
//connection to the database
require 'database.php';

//defining the $'s to so that the database can fetch info and as listed below it will appear on the screen
if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
    <head>

    <title>Login Established</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">      
    </head>
    
    <body> 
      
        
        <?php if( !empty($user) ): ?>



<br>
		<br />Good to have you here <?= $user['email']; ?> 
		<br /><br />You are in the club! Enjoy some complimentary and imaginary apricots and sparkeling wine!
		<br /><br />
     <img src="http://68.media.tumblr.com/d4c39fc8f2d78960d704680257c91e22/tumblr_oovzefsJQ41u1qnwto1_1280.png"> 
       <br /><br />
		<a href="index.php">Logout</a>, because the party is over...

	<?php else: ?>

		<h1>Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php">Register</a>

	<?php endif; ?>
    
    
    
    
    </body>
</html>