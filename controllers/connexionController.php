<?php
include_once './models/users.php';

$users = new users();

$insertSuccess = false;
$formError = array();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $user = $users->getByEmail($_POST['email']);
  if (!$user) {
    $formError['error'] = 'Adresse email ou mot de passe invalide';
  } else {
    if ($_POST['password'] === $user['password']) {
      // Connexion réussie
      $insertSuccess = true;
      session_start();
      $_SESSION['user'] = $user;
    } else {
      $formError['error'] = 'Adresse email ou mot de passe invalide';
    }
  }
}
?>
