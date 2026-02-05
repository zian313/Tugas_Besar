<?php
// Override cache path for OneDrive compatibility
if (!defined('LARAVEL_CACHE_PATH')) {
    $tempCacheDir = sys_get_temp_dir() . '/laravel_cache_' . md5(dirname(__DIR__));
    if (!is_dir($tempCacheDir)) {
        @mkdir($tempCacheDir, 0777, true);
    }
    define('LARAVEL_CACHE_PATH', $tempCacheDir);
}