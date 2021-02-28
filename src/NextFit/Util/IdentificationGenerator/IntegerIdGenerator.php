<?php declare(strict_types=1);


namespace BinPacking\NextFit\Util\IdentificationGenerator;


use BinPacking\NextFit\Util\InternalHelper;

class IntegerIdGenerator implements IntegerIdInterface
{
    private static ?IntegerIdGenerator $instance = null;

    protected function __construct() { }

    protected function __clone() { }

    /**
     * @var int[]
     */
    private array $lastGeneratedIds = [];

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): IntegerIdGenerator
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }


    public function generate(): int
    {
        $internalHelper = InternalHelper::getInstance();
        $callerFileName = $internalHelper->getObjectCallerFileName();

        if (!array_key_exists($callerFileName, $this->lastGeneratedIds)) {
           $this->lastGeneratedIds[$callerFileName] = 0;
        }

        return ++$this->lastGeneratedIds[$callerFileName];
    }
}