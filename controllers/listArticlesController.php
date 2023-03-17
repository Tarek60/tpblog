<?php
require_once 'models/articles.php';

$articles = new articles();
$listArticles = $articles->listArticles();


?>
