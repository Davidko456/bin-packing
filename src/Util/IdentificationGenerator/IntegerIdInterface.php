<?php declare(strict_types=1);


namespace BinPacking\Util\IdentificationGenerator;


interface IntegerIdInterface
{
    public function generate(): int;
}