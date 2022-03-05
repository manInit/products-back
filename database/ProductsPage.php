<?php 

require_once 'DB.php';

class ProductsPage
{
    private DB $db;
    private int $pageCount;

    public function __construct($pageCount = 12) 
    {
        $this->db = new DB();
        $this->pageCount = $pageCount;
    }

    public function getPage($idCategory, $page)
    {
        if ($page <= 0) return [];

        $offset = ($page - 1) * $this->pageCount;

        $data = $this->db->queryRows("
            SELECT DISTINCT p.id, p.label, i.alt, i.file_path, c.id AS category_id, c.label AS category FROM products p
            INNER JOIN field_main_images fmi ON fmi.pid = p.id
            INNER JOIN images i ON i.id = fmi.image_id
            LEFT JOIN field_main_categories fmc ON fmc.pid = p.id
            INNER JOIN categories c ON c.id = fmc.cid
            LEFT JOIN field_categories fc ON fc.pid = p.id 
            WHERE (fc.cid = :id OR fmc.cid = :id) AND p.status = 'ENABLE'
            ORDER BY p.id", 
            ['id' => $idCategory]
        );

        $count = count($data);
        $pagesCount = ceil($count / $this->pageCount);
        $productsPage = array_slice($data, $offset, $this->pageCount);

        if (!isset($productsPage[0])) return [];

        return [
            'data' => $productsPage,
            'pageCount' => $pagesCount
        ];
    }
}