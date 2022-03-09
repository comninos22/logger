<?php

namespace Logger\Connections;

use \PDO as PDO;
use \PDOException as PDOException;
use \Exception as Exception;
use Logger\SqlConstants;

class DB
{
    public $pdo;
    private static $instance;
    public $previousConnectionString;
    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    private function __construct()
    {
        $this->connect();
    }
    function connect()
    {
        try {
            $this->pdo = new PDO(
                SqlConstants::HOST,
                SqlConstants::USERNAME,
                SqlConstants::PASSWORD,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                )
            );
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), (int)$e->getCode());
        }
        return $this;
    }
    public function run($sql, $args = null)
    {
        if (!$args) {
            return $this->pdo->query($sql);
        }
        $stmt = $this->pdo->prepare('' . $sql);
        $stmt->execute($args);
        return $stmt;
    }
}
