<?php

include_once './models/users.php';
include_once './models/roles.php';

$users = new users();

$roles = new roles();
$allRoles = $roles->displayAllRoles();

$insertSuccess = false;
$formError = array();

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

  // Vérifier que les champs requis ne sont pas vides
  if (empty($_POST['firstName'])) {
    $formError['firstName'] = 'Le champ prénom est obligatoire.';
  }

  if (empty($_POST['lastName'])) {
    $formError['lastName'] = 'Le champ nom est obligatoire.';
  }

  if (empty($_POST['email'])) {
    $formError['email'] = 'Le champ email est obligatoire.';
  }

  if (empty($_POST['password'])) {
    $formError['password'] = 'Le champ mot de passe est obligatoire.';
  }

  if (empty($_POST['ID_roles'])) {
    $formError['ID_roles'] = 'Veuillez sélectionner un rôle.';
  }

  if (count($formError) == 0) {
    // Les champs requis sont remplis
    // Ajouter un nouvel utilisateur
    $users->firstName = htmlspecialchars($_POST['firstName']);
    $users->lastName = htmlspecialchars($_POST['lastName']);
    $users->email = htmlspecialchars($_POST['email']);
    $users->password = htmlspecialchars($_POST['password']);
    $users->ID_roles = htmlspecialchars($_POST['ID_roles']);
    $insertSuccess = true;
    $users->addUsers();
  } else {
    // Un ou plusieurs champs requis sont vides
    $formError['error'] = 'Veuillez remplir tous les champs.';
  }
}



?>
