<?php 

class DB 
{
    private PDO $db;

    public function __construct(
        $server = 'localhost', 
        $dbName = 'products', 
        $user = 'root',
        $password = ''
    ) {
        $connectionString = 'mysql:host=' . $server . ';dbname=' . $dbName;
        $this->db = new PDO($connectionString, $user, $password);
    }

    public function queryRows($sql, $params = []) 
    {
        $query = $this->query($sql, $params);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
  
    private function query($sql, $params) 
    {
        $prepareQuery = $this->db->prepare($sql);
        if (count($params) != 0) {
            foreach ($params as $param => $value) {
                $prepareQuery->bindValue(':' . $param, $value); 
            }
        }
        $prepareQuery->execute();
        return $prepareQuery;
    }
}