<?php

use App\Helpers\Config;

include_once './vendor/autoload.php';

var_dump(Config::get('database', 'pdo'));