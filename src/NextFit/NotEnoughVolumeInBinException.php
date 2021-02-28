<?php declare(strict_types=1);


namespace BinPacking\NextFit;


use JetBrains\PhpStorm\Pure;

class NotEnoughVolumeInBinException extends \Exception
{
    #[Pure] public function __construct()
    {
        parent::__construct("Bin available volume is smaller then needed volume.");
    }
}