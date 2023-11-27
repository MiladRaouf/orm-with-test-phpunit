<?php

namespace App\Database;

use App\Contracts\DatabaseConnectionInterface;

class PdoDatabaseConnection implements DatabaseConnectionInterface {
    public function connect(){}
    public function getConnection(){}
}