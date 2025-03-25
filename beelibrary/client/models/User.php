<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn getUserByEmail: " . $e->getMessage());
            return false;
        }
    }

    public function createUser($username, $email, $phone, $password, $role = 'customer') {
        try {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("
                INSERT INTO users (username, email, phone, password, role) 
                VALUES (:username, :email, :phone, :password, :role)
            ");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn createUser: " . $e->getMessage());
            return false;
        }
    }

    public function isEmailExists($email) {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn isEmailExists: " . $e->getMessage());
            return false;
        }
    }

    public function isPhoneExists($phone) {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE phone = :phone");
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            error_log("Lỗi truy vấn isPhoneExists: " . $e->getMessage());
            return false;
        }
    }
}
?>