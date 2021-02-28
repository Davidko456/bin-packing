<?php declare(strict_types=1);


namespace BinPacking\NextFit\Box;


interface BoxInterface
{
    public function getVolume(): float;
}