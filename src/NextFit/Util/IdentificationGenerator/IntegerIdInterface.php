<?php declare(strict_types=1);


namespace BinPacking\NextFit\Util\IdentificationGenerator;


interface IntegerIdInterface
{
    public function generate(): int;
}