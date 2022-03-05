<?php 

require_once 'DB.php';

class CategoriesList
{
    private DB $db;

    public function __construct() 
    {
        $this->db = new DB();
    }

    public function getCategories()
    {
        return $this->db->queryRows("
            WITH common AS (SELECT * FROM field_categories fc UNION ALL SELECT * FROM field_main_categories) 
            SELECT c.id, c.label, COUNT(common.pid) AS product_count from common
            RIGHT JOIN categories c ON common.cid = c.id
            INNER JOIN products p ON p.id = common.pid
            WHERE p.status = 'ENABLE'
            GROUP BY c.id
            HAVING product_count > 0
            ORDER BY product_count DESC"
        );
    }
}