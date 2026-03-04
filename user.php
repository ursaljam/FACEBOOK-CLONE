<?php
class User {
    private $conn;
    private $table = 'users';

    public $id;
    public $username;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register user
    public function register() {
        $query = "INSERT INTO " . $this->table . " (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $this->username, $this->email, $this->password);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Login user
    public function login() {
        $query = "SELECT id, username, password FROM " . $this->table . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->id, $this->username, $this->password);
        
        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($this->password, $this->password)) {
                return true;
            }
        }
        return false;
    }
}
?>
