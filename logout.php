<?php
  // Destruye la sesión y redirige al login
  session_start();
  
  session_unset();

  session_destroy();

  header('Location: /php-login-simple/signup.php');
?>
