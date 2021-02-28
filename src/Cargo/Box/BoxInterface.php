<?php declare(strict_types=1);


namespace BinPacking\Cargo\Box;


interface BoxInterface
{
    public function getVolume(): float;
}