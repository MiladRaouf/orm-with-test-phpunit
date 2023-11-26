<?php

namespace Tests\Unit;

use App\Exceptions\ConfigFileNotFoundException;
use App\Helpers\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testGetFileContentsReturnsArray()
    {
        $config = Config::getFileContents('database');
        $this->assertIsArray($config);
    }

    public function testItThrowsExceptionItFileNotFound()
    {
        $this->expectException(ConfigFileNotFoundException::class);
        $config = Config::getFileContents('not');
    }

    public function testGetMethodReturnsValidData() {
        $config = Config::get('database', 'pdo');

        $expectedData = [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'bug_tracker',
            'db_user' => 'root',
            'db_password' => '123456'
        ];

        $this->assertEquals($config, $expectedData);
    }
}
