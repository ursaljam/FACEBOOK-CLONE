<?php
class Post {
    private $conn;
    private $table = 'posts';

    public $id;
    public $user_id;
    public $content;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create post
    public function createPost() {
        $query = "INSERT INTO " . $this->table . " (user_id, content) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $this->user_id, $this->content);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Get all posts
    public function getAllPosts() {
        $query = "SELECT posts.id, posts.content, users.username, posts.created_at 
                  FROM posts 
                  JOIN users ON posts.user_id = users.id 
                  ORDER BY posts.created_at DESC";
        $result = $this->conn->query($query);
        return $result;
    }
}
?>
