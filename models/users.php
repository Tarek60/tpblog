<?php

include_once 'dataBase.php';

class users extends dataBase {
  // Déclaration des attributs de la table User
  public int $id;
  public string $firstName;
  public string $lastName;
  public string $email;
  public string $password;
  public string $created_at;
  public int $ID_roles;

  /**
  * Déclaration de la méthode magique construct
  */
  public function __construct() {
    parent::__construct();
  }

  public function addUsers() {
    $now = date('Y-m-d H:i:s');
    $query = $this->db->prepare('INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`, `created_at`, `ID_roles`) VALUES (:firstName, :lastName, :email, :password, :created_at, :ID_roles)');
    $query->bindParam(':firstName', $this->firstName);
    $query->bindParam(':lastName', $this->lastName);
    $query->bindParam(':email', $this->email);
    $query->bindParam(':password', $this->password);
    $query->bindParam(':created_at', $now);
    $query->bindParam(':ID_roles', $this->ID_roles);
    return $query->execute();
  }

  public function showUsersList() {
    $query = $this->db->query('SELECT * FROM `users`');
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getByEmail($email) {
    $query = $this->db->prepare('SELECT * FROM `users` WHERE `email` = :email');
    $query->bindParam(':email', $email);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function __destruct() {
    parent::__destruct();
  }
}
