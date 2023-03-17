<?php
session_start();
require_once 'controllers/listArticlesController.php';
include_once 'header.php';
?>

<div class="container">
  <h1 id="listArticlesTitle">Liste articles</h1>
  <div class="listArticlesDiv">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($listArticles as $article) { ?>
        <div class="col">
          <div class="card h-100">
            <img src="assets/img/articles.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $article['title'] ?></h5>
              <p class="card-text"><?= substr($article['content'], 0, 100) . "..." ?></p>
              <a href="showArticle.php?id=<?= $article['id'] ?>" class="btn btn-primary">Voir l'article</a>
              <?php if (isset($_SESSION['user']) && $_SESSION['user']['ID_roles'] == 1) { ?>
                <a href="deleteArticle.php?id=<?= $article['id'] ?>" class="btn btn-danger">Supprimer l'article</a>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</body>
</html>
