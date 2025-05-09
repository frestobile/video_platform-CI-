<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoadEnv {
    public function initializeEnv() {
        $env_path = realpath(APPPATH . '.env');
        if (!$env_path || !file_exists($env_path)) return;

        $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0 || !str_contains($line, '=')) continue;

            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            putenv("$key=$value");   // ✅ visible to getenv()
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}