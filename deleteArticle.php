<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['ID_roles'] == 1 && isset($_GET['id'])) {
    require_once 'models/articles.php';
    $articles = new articles();
    $articles->deleteArticle($_GET['id']);
}

header('Location: listArticles.php');
exit();
?>
