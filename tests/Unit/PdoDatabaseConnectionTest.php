<?php

namespace Tests\Unit;

use App\Contracts\DatabaseConnectionInterface;
use App\Database\PdoDatabaseConnection;
use App\Helpers\Config;
use PHPUnit\Framework\TestCase;

class PdoDatabaseConnectionTest extends TestCase {
    public function testPdoDatabaseConnectionImplementsDatabaseConnectionInterface() {
        $config = $this->getConnection();
        
        $pdoConnection = new PdoDatabaseConnection($config);

        $this->assertInstanceOf(DatabaseConnectionInterface::class, $pdoConnection);
    }

    private function getConnection() {
        return Config::get('database', 'pdo_testing');
    }
}