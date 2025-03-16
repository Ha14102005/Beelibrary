<?php

class Admin
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối đến CSDL
    }

    // Lấy tất cả tài khoản theo loại (admin hoặc user)
    public function getAllTaiKhoan($role)
    {
        $sql = "SELECT * FROM users WHERE role = :role";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách tài khoản
    }

    // Thêm tài khoản vào CSDL
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
            echo 'Lỗi: ' . $e->getMessage();
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
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Xóa tài khoản khách hàng theo ID
    public function deleteKhachHangById($id)
    {
        try {
            $sql = "DELETE FROM users WHERE user_id = :id AND role = 'Client'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Xóa tài khoản quản trị viên theo ID
    public function deleteQuanTriById($id)
    {
        try {
            $sql = "DELETE FROM users WHERE user_id = :id AND role = 'admin'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
}
?>
