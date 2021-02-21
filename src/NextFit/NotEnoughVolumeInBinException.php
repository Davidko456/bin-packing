<?php


namespace BinPacking\NextFit;


use JetBrains\PhpStorm\Pure;
use Throwable;

class NotEnoughVolumeInBinException extends \Exception
{
    #[Pure] public function __construct()
    {
        parent::__construct("Bin available volume is smaller then needed volume.");
    }
}