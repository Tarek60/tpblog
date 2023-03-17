<?php

include_once 'dataBase.php';

class roles extends dataBase {

  // Déclaration des attributs de la table roles
  public int $ID;
  public string $label;

  /**
  * Déclaration de la méthode magique construct
  */
  public function __construct() {
    parent::__construct();
  }
  /**
  * Afficher tous les rôles
  */
  public function displayAllRoles() {
        $query = $this->db->query('SELECT * FROM roles');
        $roles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
}

  public function __destruct() {
    parent::__destruct();
  }

}


?>
