<?php
session_start();
require_once 'controllers/listUsersController.php';
include_once 'header.php';
?>
<div class="container">
  <div class="listUsers">
    <?php foreach ($listUsers as $user) { ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><?= $user['firstName'] ?> <?= $user['lastName'] ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= $user['email'] ?></h6>
          <p class="card-text">ID: <?= $user['ID_roles'] ?></p>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
