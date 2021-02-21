<?php


namespace BinPacking\NextFit;


abstract class Block
{
    private int|float $size;

    public function getSize(): float|int
    {
        return $this->size;
    }

    public function setSize(float|int $size): void
    {
        $this->size = $size;
    }
}