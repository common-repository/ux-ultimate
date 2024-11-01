<?php
namespace UxUltimate\Plugin\Lib\Blade;

use duncan3dc\Laravel\BladeInstance;
use duncan3dc\Laravel\BladeInterface;

class Blade {
    private static $instance;

    public static function setInstance(BladeInstance $instance): void
    {
        static::$instance = $instance;
    }

    public static function getInstance(): BladeInterface
    {
        if (!static::$instance) {
            # Calculate the parent of the vendor directory
            $path = realpath(__DIR__ . "/../..");
            if (!is_string($path) || !is_dir($path)) {
                throw new \RuntimeException("Unable to locate the root directory: {$path}");
            }

            static::$instance = new BladeInstance("{$path}/resources/views", "{$path}/../../uxu-cache/views");
        }

        return static::$instance;
    }
}