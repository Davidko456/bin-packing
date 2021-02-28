<?php declare(strict_types=1);


namespace BinPacking\Tests\NextFit;


use BinPacking\NextFit\Bin;
use BinPacking\NextFit\Item;
use BinPacking\NextFit\NotEnoughVolumeInBinException;
use BinPacking\Util\Dimensions3D;
use PHPStan\Testing\TestCase;

class BinTest extends TestCase
{
    public function testAddBinSuccess(): void
    {
        $items = [];
        $items[] = new Item(new Dimensions3D(2, 2, 2));
        $items[] = new Item(new Dimensions3D(3, 2, 2));
        $items[] = new Item(new Dimensions3D(4, 2, 2));

        $bin = new Bin(new Dimensions3D(6, 3, 2));
        foreach ($items as $item) {
            $bin->addBox($item);
        }

        self::assertEquals(0, $bin->getAvailableVolume());
        self::assertCount(3, $bin->getBoxes());
    }

    public function testAddBinFail(): void
    {
        $this->expectException(NotEnoughVolumeInBinException::class);

        $item = new Item(new Dimensions3D(2, 2, 2));
        $bin = new Bin(new Dimensions3D(1, 1, 1));
        $bin->addBox($item);
    }
}