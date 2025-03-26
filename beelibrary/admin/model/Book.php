<?php

class Book
{
    public $book_id;
    public $title;
    public $author;
    public $category_id;
    public $price;
    public $stock;
    public $description;
    public $image;
    public $published_date;
    public $category_name; // ✅ Thêm thuộc tính này


    public function __construct()
    {
        
    }

    public function __destruct()
    {
        
    }
}



?>