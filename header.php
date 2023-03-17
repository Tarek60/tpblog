<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Accueil</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">BLOG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php if (isset($_SESSION['user']) && $_SESSION['user']['ID_roles'] == 1) { ?>
          <li class="nav-item">
            <a class="nav-link" href="listArticles.php">Articles</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="createArticle.php">Créer un article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listUsers.php">Liste utilisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="deconnexion.php">Deconnexion</a>
            </li>
          <?php } ?>

          <?php if (isset($_SESSION['user']) && $_SESSION['user']['ID_roles'] == 2) { ?>
            <li class="nav-item">
              <a class="nav-link" href="listArticles.php">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="deconnexion.php">Deconnexion</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
