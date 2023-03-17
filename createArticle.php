<?php
session_start();
include_once 'controllers/createArticleController.php';
include_once 'header.php';
?>
<div class="container">
  <div class="createArticleDiv">
    <h1>Créer un article</h1>
    <form action="createArticle.php" method="POST">
      <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea class="form-control" name="content" rows="5" required></textarea>
      </div>
      <div class="form-group">
        <label for="published_at">Date de publication</label>
        <input type="date" class="form-control" name="published_at">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Créer l'article</button>
    </form>
    <?php if ($insertSuccess) { ?>
      <div class="alert alert-success" role="alert"><?= $insertSuccess ? 'Votre article a bien été créer' : '' ?>
    <?php } ?>
    <?php foreach ($formError as $error) { ?>
      <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php } ?>
  </div>
</div>
