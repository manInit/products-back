<?php 

require_once 'DB.php';

class Product
{
    private DB $db;

    public function __construct() 
    {
        $this->db = new DB();
    }

    public function getProduct($id)
    {
        $images = $this->getExtraImages($id);
        $categories = $this->getExtraCategories($id);
        $mainData = $this->getMainInfo($id);

        return [
            'images' => $images,    
            'categories' => $categories,
            'main' => $mainData
        ];
    }

    private function getMainInfo($id) 
    {
        return $this->db->queryRows('
            SELECT p.label, p.price, p.original_price, p.promo_price, p.description, i.alt, i.file_path, c.label as category, c.id as category_id FROM products p
            INNER JOIN field_main_categories fc ON fc.pid = p.id 
            INNER JOIN categories c ON fc.cid = c.id
            INNER JOIN field_main_images fi ON fi.pid = p.id 
            INNER JOIN images i ON fi.image_id = i.id
            WHERE p.id = :id', 
            ['id' => $id]
        );
    }

    private function getExtraImages($id)
    {
        return $this->db->queryRows('
            SELECT i.id, i.alt, i.file_path FROM images i 
            INNER JOIN field_images fi ON fi.image_id = i.id 
            WHERE fi.pid = :id', 
            ['id' => $id]
        );
    } 

    private function getExtraCategories($id)
    {
        return $this->db->queryRows('
            SELECT c.id, c.label, c.teaser_text FROM categories c 
            INNER JOIN field_categories fc ON fc.cid = c.id 
            WHERE fc.pid = :id', 
            ['id' => $id]
        );
    }
}