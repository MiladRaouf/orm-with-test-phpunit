<?php

namespace App\Helpers;

use App\Exceptions\ConfigFileNotFoundException;

class Config
{
    public static function getFileContents(string $fileName)
    {
        $filePath = realpath(__DIR__ . '/../configs/' . $fileName . '.php');

        if (!$fileName) {
            throw new ConfigFileNotFoundException();
        }

        $fileContent = require $filePath;

        return $fileContent;
    }

    public static function get(string $filename, string $key = null)
    {
        $fileContent = self::getFileContents($filename);

        if (is_null($key)) {
            return $fileContent;
        }

        return $fileContent[$key] ?? null;
    }
}
