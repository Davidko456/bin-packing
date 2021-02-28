<?php declare(strict_types=1);


namespace BinPacking\Tests\Cargo;


use BinPacking\Cargo\Item;
use BinPacking\Util\Dimensions3D;
use PHPStan\Testing\TestCase;

class ItemTest extends TestCase
{
    public function test(): void
    {
        $item = new Item(new Dimensions3D(1, 2, 3));
        $itemTwo = new Item(new Dimensions3D(4, 5, 6));

        self::assertSame(1, $item->getId());
        self::assertSame(2, $itemTwo->getId());

        self::assertSame(6.0, $item->getVolume());
        self::assertSame(1.0, $item->getDimensions()->getX());
        self::assertSame(2.0, $item->getDimensions()->getY());
        self::assertSame(3.0, $item->getDimensions()->getZ());

        self::assertSame(120.0, $itemTwo->getVolume());
        self::assertSame(4.0, $itemTwo->getDimensions()->getX());
        self::assertSame(5.0, $itemTwo->getDimensions()->getY());
        self::assertSame(6.0, $itemTwo->getDimensions()->getZ());
    }
}