<?php
session_start();
require_once 'controllers/inscriptionController.php';
include_once 'header.php';
?>

<div class="container">
  <div class="inscriptionDiv">
    <h1>Inscription Blog</h1>
    <form action="inscription.php" method="post">
      <div class="form-group">
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Entrez votre prénom">
      </div>
      <div class="form-group">
        <label for="lastName">Nom</label>
        <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Entrez votre nom">
      </div>
      <div class="form-group">
        <label for="email">Adresse mail</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre adresse mail">
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
      </div>

      <label for="roles">Rôle :</label>
      <select class="form-select" aria-label="Default select example" name="ID_roles">
        <option selected disabled>...</option>
        <?php foreach ($allRoles as $role) { ?>
          <option value="<?= $role['ID'] ?>"><?= $role['label'] ?></option>
        <?php } ?>
      </select>
      <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
    </form>

    <?php if ($insertSuccess) { ?>
      <div class="alert alert-success" role="alert"><?= $insertSuccess ? 'Votre compte à bien été enregistrer. Vous pouvez maintenant vous ' : '' ?>
        <a href="connexion.php">connecter</a></div>
    <?php } ?>

    <?php foreach ($formError as $error) { ?>
      <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php } ?>
  </div>
</div>

</body>
</html>
