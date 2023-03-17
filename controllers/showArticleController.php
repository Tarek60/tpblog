<?php
require_once './models/articles.php';
require_once './models/comments.php';

$articles = new articles();

// Récupération de l'ID de l'article depuis l'URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Récupération des informations de l'article avec l'ID
  $showArticle = $articles->getArticle($id);
}

$comments = new comments();
$articleId = $_GET['id'];
if (isset($_POST['comment'])) {
  $comments->addComment($_POST['comment'], $articleId, $_SESSION['user']['id']);
}

$allComments = $comments->getCommentsForArticle($articleId);

 ?>
