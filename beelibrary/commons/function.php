<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
function checkLoginAdmin(){
    if (!isset($_SESSION['user_admin'])) { //không có sestion thì ridiẻct về admin
      require_once './view/auth/formLogin.php';
      exit();
    }
   }
function deleteSessionError(){
    if (isset($_SESSION['flash'])) {
        //hủy session sau khi đã tải trang
        unset($_SESSION['flash']);
        session_unset();
        // session_destroy();
  
    }
  }
function pdo_query($sql, $sql_args = [])
{
    $conn = connectDB(); // Kết nối cơ sở dữ liệu
    $stmt = $conn->prepare($sql);
//    $stmt->execute($sql_args);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pdo_query_value($sql, $sql_args = [])
{
    $conn = connectDB();
    $stmt = $conn->prepare($sql);
//    $stmt->execute($sql_args);
    return $stmt->fetchColumn();
}

?>
