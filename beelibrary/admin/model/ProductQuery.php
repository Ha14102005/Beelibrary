<?php

class ProductQuery
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = connectDB();
    }

    public function __destruct()
    {
        //Đóng kết  nối CSDL
        $this->pdo = null;
    }

    public function all()
    {
        try {
            //1.Viét câu lệnh sql
            $sql = "SELECT DISTINCT * FROM product";
            //Lưu ý: Nếu gặp lỗi 'no database selected" thì bổ sung thêm tên database trước tên bảng

            //2.Thực hiện truy vấn
            $data = $this->pdo->query($sql)->fetchAll();

            //3.Convert dữ liệu từ array sang object
            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();

                //Gán giá trị
                $product->id = $value["id"];
                $product->category_id = $value["category_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->image_src = $value["image_src"];
                $product->created_date = $value["created_date"];

                array_push($danhSach, $product);
            }

            //4. Return kết quả
            return $danhSach;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }


    public function insert(Product $product)
    {
        try {

            $sql = "INSERT INTO product(category_id, name, description, price, stock, image_src, created_date) VALUES('" . $product->category_id . "','" . $product->name . "', '" . $product->description . "', '" . $product->price . "', '" . $product->stock . "',  '" . $product->image_src . "','" . $product->created_date . "')";
            var_dump($sql);
            echo "<hr>";

            $data = $this->pdo->exec($sql);


            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    public function find($id)
    {
        try {
            $sql = "SELECT * FROM product WHERE id = $id";

            $data = $this->pdo->query($sql)->fetch();

            if ($data !== false) {
                $product = new Product();
                $product->id = $data["id"];
                $product->category_id = $data["category_id"];
                $product->name = $data["name"];
                $product->description = $data["description"];
                $product->price = $data["price"];
                $product->stock = $data["stock"];
                $product->image_src = $data["image_src"];
                $product->created_date = $data["created_date"];

                return $product;
            } else {
                echo "ID không tồn tại. Mời bạn kiểm tra lại <br>";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    public function update($id, Product $product)
    {
        try {
            $sql = "UPDATE product SET `name` = '" . $product->name . "', `description` = '" . $product->description . "',  `price` = '" . $product->price . "', `stock` = '" . $product->stock . "', `image_src` = '" . $product->image_src . "', `created_date` = '" . $product->created_date . "' WHERE `id` = $id";

            $data = $this->pdo->exec($sql);

            if ($data === 1 || $data === 0) {
                return "success";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }

    public function delete($id)
    {
        try {
            // 1. Viết câu lệnh sql
            $sql = "DELETE FROM product WHERE id = $id";

            // 2. Thực hiện truy vấn
            $data = $this->pdo->exec($sql);

            // 3. Return kết quả
            return "success";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            echo "<hr>";
        }
    }
}
