<?php

class Admin
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Kết nối cơ sở dữ liệu


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
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Chỉ lấy dữ liệu dạng key-value

        // Kiểm tra user có tồn tại không
        if (!$user) {
            return "Sai tài khoản hoặc mật khẩu"; // Email không tồn tại
        }

        // Kiểm tra mật khẩu có đúng không
        if (!password_verify($password, $user['password'])) {
            return "Sai tài khoản hoặc mật khẩu"; // Mật khẩu sai
        }

        // Kiểm tra quyền admin
        if ($user['role'] !== 'admin') {
            return "Tài khoản không có quyền đăng nhập";
        }

        return $user; // Trả về toàn bộ thông tin user
    } catch (Exception $e) {
        return "Lỗi hệ thống: " . $e->getMessage();
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
