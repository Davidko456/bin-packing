<?php declare(strict_types=1);


namespace BinPacking\Util;


use Exception;

abstract class Singleton
{
    private static ?self $instance = null;

    protected function __construct() { }

    protected function __clone() { }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserializable a singleton.");
    }

    /**
     * @return static
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}