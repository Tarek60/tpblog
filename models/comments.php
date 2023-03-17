<?php

include_once 'dataBase.php';

class comments extends dataBase {

  // Déclaration des attributs de la table roles
  public int $id;
  public string $content;
  public string $created_at;
  public string $id_articles;
  public string $id_users;

  /**
  * Déclaration de la méthode magique construct
  */
  public function __construct() {
    parent::__construct();
  }

  public function addComment($content, $id_articles, $id_users) {
    $now = date('Y-m-d H:i:s');
    $query = $this->db->prepare('INSERT INTO comments (content, created_at, id_articles, id_users) VALUES (:content, :created_at, :id_articles, :id_users)');
    $query->bindParam(':content', $content);
    $query->bindParam(':created_at', $now);
    $query->bindParam(':id_articles', $id_articles);
    $query->bindParam(':id_users', $id_users);
    $query->execute();
  }

  public function getCommentsForArticle($articleId) {
    $query = $this->db->prepare('SELECT c.id, c.content, c.created_at, c.id_users, u.firstName, u.lastName
      FROM comments c
      INNER JOIN users u ON c.id_users = u.id
      WHERE c.id_articles = :articleId
      ORDER BY c.created_at DESC');
    $query->bindParam(':articleId', $articleId, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

    public function deleteComment($id) {
      $query = $this->db->prepare('DELETE FROM comments WHERE id = :id');
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      return $query->execute();
    }

    public function __destruct() {
      parent::__destruct();
    }

  }


  ?>
