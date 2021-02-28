<?php declare(strict_types=1);


namespace BinPacking\Util\IdentificationGenerator;


use BinPacking\Util\InternalHelper;
use BinPacking\Util\Singleton;

class IntegerIdGenerator extends Singleton implements IntegerIdInterface
{
    /**
     * @var int[]
     */
    private array $lastGeneratedIds = [];

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