<?php

abstract class Model
{
    private PDO $db;
    
    protected function execRequest(string $sql, array $params = null) : PDOStatement
    {
        $reqSql = ($this->getDB())->prepare($sql);
        $reqSql->execute($params);
        return $reqSql;
    }

    public function getDB() : PDO
    {
        if(!isset($this->db))
        {
            $this->db = new PDO(
                'mysql:host=localhost;dbname=grp-223_s3_sae;charset=utf8',
                'grp-223', 
                'nkksqopb',
                array(
                    PDO::ATTR_ERRMODE =>
                    PDO::ERRMODE_EXCEPTION
                )
            );
        }
        

        return $this->db;
    }


}
?>