<?php 
require 'vendor/autoload.php';

class Posts extends Dbh {
    public function getPost() {
        $sql = "SELECT *FROM posts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function addPost($title, $body, $author) {
        $sql = 'INSERT INTO posts(title, body, author) VALUES(?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($title, $body, $author));
        //echo $title.' '.$body.' '.$author;

    }

    public function editPost($id) {
        $sql = "SELECT * FROM posts where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($title, $body, $author, $id) {
        $sql = "UPDATE posts SET title = ?, body = ?, author = ? where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $body, $author, $id]);
    }

    public function delPOst($id) {
        $sql = "DELETE FROM posts where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>