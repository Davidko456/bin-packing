<?php declare(strict_types=1);

namespace BinPacking\Cargo\Box;


use BinPacking\Util\Dimensions3D;
use JetBrains\PhpStorm\Pure;

abstract class Box implements BoxInterface
{
    private Dimensions3D $dimensions;

    public function __construct(Dimensions3D $dimensions)
    {
        $this->dimensions = $dimensions;
    }

    public function getDimensions(): Dimensions3D
    {
        return $this->dimensions;
    }

    #[Pure] public function getVolume(): float
    {
        return $this->getDimensions()->getX() * $this->getDimensions()->getY() * $this->getDimensions()->getZ();
    }
}