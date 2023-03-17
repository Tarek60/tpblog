<?php
include_once './models/users.php';

$users = new users();
$listUsers = $users->showUsersList();

 ?>
