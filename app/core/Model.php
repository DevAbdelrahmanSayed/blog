<?php
namespace BLOG\core;

use PDO;
use PDOException;

class Model
{
    
    protected $db;
    protected $table;
    protected $host = SERVER;
    protected $dbname = DB_NAME;
    protected $user = USERNAME;
    protected $pass = PASSWORD;
    protected $charset = CHARSET;
    protected $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function __construct()
    {
        if (DATABASE_TYPE  == 'mysql') {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
            try {
                $this->db = new PDO($dsn, $this->user, $this->pass, $this->options);
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }

    public function select_all(string $query, $params = [])
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function select_one(string $query, $params = [])
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public function data(string $query, $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
    public function update(string $query, $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function is_exist(string $query, array $params)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }
}
