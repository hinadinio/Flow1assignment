<? php 
//this the logout session, where it will take you to the front page when you log out. 
session_start();
session_unset();
session_destroy();
header("Location: index.php");

