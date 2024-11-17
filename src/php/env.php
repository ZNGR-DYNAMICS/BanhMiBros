<?php
function loadEnv($file)
{
    if (!file_exists($file)) {
        throw new Exception(".env file does not exist");
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}

loadEnv(__DIR__ . '/../../.env');
