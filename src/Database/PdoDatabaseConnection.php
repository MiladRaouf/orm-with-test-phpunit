<?php

namespace App\Database;

use App\Contracts\DatabaseConnectionInterface;
use PDO;
use PDOException;

class PdoDatabaseConnection implements DatabaseConnectionInterface
{
    protected $connection;
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        try {
            $dsn = $this->generateDsn($this->config);

            $this->connection = new PDO(...$dsn);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new DatabaseConnectionFailesException();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function generateDsn(array $config): array
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']}";

        return [$dsn, $config['db_user'], $config['db_password']];
    }
}
