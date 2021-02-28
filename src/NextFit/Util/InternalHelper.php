<?php declare(strict_types=1);


namespace BinPacking\NextFit\Util;



class InternalHelper
{
    private static ?InternalHelper $instance = null;

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): InternalHelper
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getObjectCallerFileName(int $step=1): string
    {
        return debug_backtrace()[$step]['file'];
    }
}