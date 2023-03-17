<?php
include_once 'controllers/connexionController.php';
include_once 'header.php';
?>

<div class="container">
  <div class="connexionDiv">
    <h1>Connexion</h1>
    <form action="connexion.php" method="post">

    <div class="form-group">
      <label for="email">Adresse mail</label>
      <input type="email" name="email" class="form-control" id="mail" placeholder="Entrez votre adresse mail" value="">
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" value="">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
    </form>

    <?php if ($insertSuccess) { ?>
      <div class="alert alert-success" role="alert"><?= $insertSuccess ? 'Connexion reussie, vous pouvez maintenant accéder au site.' : '' ?>
    <?php } ?>

    <?php foreach ($formError as $error) { ?>
    <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php } ?>
  </div>
</div>
