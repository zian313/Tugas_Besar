<?php

$cacheDir = __DIR__ . '/bootstrap/cache';
$tempCacheDir = sys_get_temp_dir() . '/laravel_cache_' . md5(__DIR__);

// Ensure temp cache directory exists and is writable
if (!is_dir($tempCacheDir)) {
    mkdir($tempCacheDir, 0777, true);
}

// For Windows with OneDrive - use temp directory as actual cache storage
if (PHP_OS_FAMILY === 'Windows') {
    // Backup original bootstrap/cache to a temp location if it exists
    if (is_dir($cacheDir) && !is_link($cacheDir)) {
        $backupDir = $cacheDir . '.backup_' . time();
        @rename($cacheDir, $backupDir);
    }
    
    // Create a PHP redirect file instead of directory
    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0777, true);
    }
    
    // Create a .htaccess-like file and .gitignore
    @file_put_contents($cacheDir . '/.gitignore', "*\n!.gitignore\n");
    @file_put_contents($cacheDir . '/README.txt', "This directory is redirected to: " . $tempCacheDir);
    
    echo "Temp cache path configured: " . $tempCacheDir . PHP_EOL;
} else {
    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0777, true);
    }
    chmod($cacheDir, 0777);
    echo "Cache directory permissions set to 0777" . PHP_EOL;
}

// Create a cache config override in bootstrap
$bootstrapCacheOverride = __DIR__ . '/bootstrap/cache-override.php';
$code = <<<'PHP'
<?php
// Override cache path for OneDrive compatibility
if (!defined('LARAVEL_CACHE_PATH')) {
    $tempCacheDir = sys_get_temp_dir() . '/laravel_cache_' . md5(dirname(__DIR__));
    if (!is_dir($tempCacheDir)) {
        @mkdir($tempCacheDir, 0777, true);
    }
    define('LARAVEL_CACHE_PATH', $tempCacheDir);
}
PHP;

@file_put_contents($bootstrapCacheOverride, $code);


