<?php

class Admin
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Kết nối cơ sở dữ liệu
    private function connectDB()
    {
        $host = 'localhost';
        $dbname = 'bee_library';
        $username = 'root';
        $password = '';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    // Lấy tất cả tài khoản theo role
    public function getAllTaiKhoan($role)
    {
        $sql = "SELECT * FROM users WHERE role = :role";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm tài khoản
    public function insertuser($username, $email, $phone, $password, $role)
    {
        try {
            $sql = "INSERT INTO users (username, email, phone, password, role, created_at)
                    VALUES (:username, :email, :phone, :password, :role, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':phone' => $phone,
                ':password' => $password,
                ':role' => $role
            ]);
            return true;
        } catch (Exception $e) {
            return false; // Trả về false nếu có lỗi (ví dụ: trùng email/username)
        }
    }

    // Kiểm tra đăng nhập
    public function checkLogin($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    // Lấy thông tin tài khoản theo ID
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE user_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }

    // Xóa tài khoản khách hàng
    public function deleteKhachHangById($id)
    {
        try {
            $sql = "DELETE FROM users WHERE user_id = :id AND role = 'customer'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    // Xóa tài khoản quản trị viên
    public function deleteQuanTriById($id)
    {
        try {
            $sql = "DELETE FROM users WHERE user_id = :id AND role = 'admin'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
    }
}