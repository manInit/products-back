<?php 

require_once 'DB.php';

class Category
{
    private DB $db;

    public function __construct() 
    {
        $this->db = new DB();
    }

    public function getCategory($id)
    {
        return $this->db->queryRows('
            SELECT id, label, teaser_text FROM categories WHERE id = :id',
            ['id' => $id]
        );
    }
}