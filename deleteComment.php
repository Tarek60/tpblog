<?php
require_once 'models/comments.php';

$comments = new comments();
$id = $_GET['id'];
$comments->deleteComment($id);

header('Location: listArticles.php');
exit();
?>
