<?php


namespace BinPacking\NextFit\Memory;


use Throwable;

class MemoryOverSizeException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Block is oversize to be allocated.");
    }
}