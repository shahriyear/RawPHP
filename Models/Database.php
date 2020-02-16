<?php

class Database
{

    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function readAll($table)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table);
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    public function create($table, $data)
    {
        try {
            $columns = implode(', ', array_keys($data));
            $placeHolder = implode(', :', array_keys($data));

            $query = "INSERT INTO " . $table . " (" . $columns . ") VALUES (:" . $placeHolder . ")";
            $stmt = $this->pdo->prepare($query);

            foreach ($data as $k => $v) {
                $stmt->bindValue(':' . $k, $v);
            }

            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
