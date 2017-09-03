<?php
//connect to database
require 'database.php';

//a message will displayed as defined below
$message ='';

//if the email and password not empty then insert info to database
if(!empty($_POST['email']) && !empty($_POST['password'])):



//below is the query to insert data into the database. the values we are inserting are called parameters and by using the : sign makes it safer to insert to our database
$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$stmt = $conn->prepare($sql); 
//below we are taking action into inserting info to the database. for the person to give us their password, for their safety i the password is hashed
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));

//the hash is a distortion of a password, so you can't see the original password in the database


//here the user will receive a message when attempting to register
if( $stmt->execute() ):
  $message = 'Successfully created new user!';
else:
  $message = 'So sorry, it did not work. User registration failed.';

endif;

endif;

?>


<!DOCTYPE html>
<html>
<head>
<title>Register</title>    
    
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
</head>

    <body>
  
 <div class="header">
<a href="index.php">The PHP and Database Assignment</a>  
         
</div>
    
        
<?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        
 <?php endif; ?>
            
        <h1>Register</h1>
        <span>or <a href="login.php">login here</a></span>
    
    
    
    
    <form action="register.php" method="POST">
    
        <input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="...and password" name="password">
        <input type="password" placeholder="confirm password" name="confirm_password">
        
        <input type="submit">
    
    </form>
    
    
    
    </body>





</html>

