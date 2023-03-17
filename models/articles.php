<?php

include_once 'dataBase.php';

class articles extends dataBase {

  // Déclaration des attributs de la table articles
  public int $id;
  public string $title;
  public string $content;
  public string $published_at;
  public string $created_at;
  public int $id_users;

  /**
  * Déclaration de la méthode magique construct
  */
  public function __construct() {
    parent::__construct();
  }

  public function addArticle() {
    $now = date('Y-m-d H:i:s');
    $query = $this->db->prepare('INSERT INTO articles (title, content, published_at, created_at, id_users) VALUES (:title, :content, :published_at, :created_at, :id_users)');
    $query->bindParam(':title', $this->title);
    $query->bindParam(':content', $this->content);
    $query->bindParam(':published_at', $this->published_at);
    $query->bindParam(':created_at', $now);
    $query->bindParam(':id_users', $_SESSION['user']['id']);
    $query->execute();
  }

  public function listArticles() {
    $query = $this->db->prepare('SELECT a.id, a.title, a.content, a.published_at, a.created_at, u.firstName, u.lastName
      FROM articles a
      INNER JOIN users u ON a.id_users = u.id
      ORDER BY a.created_at DESC');
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticle($id) {
      $query = $this->db->prepare('SELECT a.id, a.title, a.content, a.published_at, a.created_at, u.firstName, u.lastName FROM articles a
        INNER JOIN users u ON a.id_users = u.id
        WHERE a.id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
      }

      public function deleteArticle($id) {
        $query = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
      }

      public function __destruct() {
        parent::__destruct();
      }

    }


    ?>
