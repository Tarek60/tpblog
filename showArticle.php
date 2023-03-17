<?php
session_start();
include_once 'controllers/showArticleController.php';
include_once 'header.php';
?>

<div class="container">
  <div class="articleDiv">
    <h1><?= $showArticle['title'] ?></h1>
    <p><?= $showArticle['content'] ?></p>
    <p>Publié le <?= $showArticle['published_at'] ?> par <?= $showArticle['firstName'] ?> <?= $showArticle['lastName'] ?></p>
    <hr>
    <h3>Commentaires</h3>
    <form action="" method="post">
      <div class="form-group">
        <label for="comment">Commentaire :</label>
        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Poster le commentaire</button>
    </form>

    <hr>

    <?php foreach ($allComments as $comment) { ?>
      <div class="comment">
        <p><strong><?= $comment['firstName'] ?> <?= $comment['lastName'] ?></strong></p>
        <p><?= $comment['content'] ?></p>
        <p>Posté le <?= $comment['created_at'] ?></p>

        <?php if (isset($_SESSION['user']) && $comment['id_users'] === $_SESSION['user']['id']) { ?>
          <a href="deleteComment.php?id=<?= $comment['id'] ?>" class="btn btn-danger">Supprimer le commentaire</a>
          <a href="editComment.php?id=<?= $comment['id'] ?>" class="btn btn-success">Modifier le commentaire</a>
        <?php } ?>
      </div>
      <hr>
    <?php } ?>
  </div>
</div>
