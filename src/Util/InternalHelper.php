<?php declare(strict_types=1);


namespace BinPacking\Util;



class InternalHelper
{
    use SingletonTrait;

    public function getObjectCallerFileName(int $step=1): string
    {
        return debug_backtrace()[$step]['file'];
    }
}