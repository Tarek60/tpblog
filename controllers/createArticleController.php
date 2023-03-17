<?php

include_once './models/articles.php';

// Instancier la classe articles
$articles = new articles();


$insertSuccess = false;
$formError = array();

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

  // Vérifier que les champs requis ne sont pas vides
  if (empty($_POST['title'])) {
    $formError['title'] = 'Le champ titre est obligatoire.';
  }

  if (empty($_POST['content'])) {
    $formError['content'] = 'Le champ contenu est obligatoire.';
  }

  if (empty($_POST['published_at'])) {
    $formError['published_at'] = 'Le champ date de publication est obligatoire.';
  }


  if (count($formError) == 0) {
    // Les champs requis sont remplis
    // Ajouter un nouvel article

    $articles->title = htmlspecialchars($_POST['title']);
    $articles->content = htmlspecialchars($_POST['content']);
    $articles->published_at = htmlspecialchars($_POST['published_at']);
    $articles->addArticle();
    $insertSuccess = true;
  } else {
    // Un ou plusieurs champs requis sont vides
    $formError['error'] = 'Veuillez remplir tous les champs.';
  }
}

?>
