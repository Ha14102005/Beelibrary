<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy người dùng theo email
    public function getUserByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn getUserByEmail: " . $e->getMessage());
            return false;
        }
    }

    // Tạo người dùng mới
    public function createUser($username, $email, $password, $role = 'user') {
        try {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$username, $email, $hashed_password, $role]);
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn createUser: " . $e->getMessage());
            return false;
        }
    }

    // Kiểm tra email đã tồn tại chưa
    public function isEmailExists($email) {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn isEmailExists: " . $e->getMessage());
            return false;
        }
    }
}
?>
