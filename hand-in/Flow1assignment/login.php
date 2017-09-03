<?php
session_start();

//connect to database
require 'database.php';

//if field is not empty post email and post password

if(!empty($_POST['email']) && !empty($_POST['password'])):
//variable called records will store the information to the database
$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
$records->bindParam(':email', $_POST['email']);
$records->execute();
//to find the users email to match what has been posted
$results = $records->fetch(PDO::FETCH_ASSOC);

$message = '';
//if there the password matches we know we can log them in
if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ) {

//if it is successful then we will be headed to the secretpage
$_SESSION['user_id'] = $results['id'];
header("Location: secretpage.php"); 
}

//if connection fails we cant log in but this message will be displayed
else {
    $message = 'looks like something is missing';
}


endif;
?>




<!DOCTYPE html>
<html>
<head>
    
<title>It's cool to login</title>
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

    <h1>Login</h1>
    <span>or <a href="register.php">register here</a></span>
    
    <form action="login.php" method="POST">
    
        <input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="...and password" name="password">
        <input type="submit">
    
    </form>
    
</body>




</html>