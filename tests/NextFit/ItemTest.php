<?php declare(strict_types=1);


namespace BinPacking\Tests\NextFit;


use BinPacking\Cargo\Item;
use BinPacking\Util\Dimensions3D;
use PHPStan\Testing\TestCase;

class ItemTest extends TestCase
{
    public function test(): void
    {
        $x = 3;
        $y = 2;
        $z = 6;

        $item = new Item(new Dimensions3D($x, $y, $z));

        self::assertEquals($x, $item->getDimensions()->getX());
        self::assertEquals($y, $item->getDimensions()->getY());
        self::assertEquals($z, $item->getDimensions()->getZ());
        self::assertEquals(36, $item->getVolume());
        self::assertIsString($item->getId());
        $itemId = $item->getId();
    }
}