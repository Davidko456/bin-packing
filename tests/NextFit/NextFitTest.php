<?php


namespace BinPacking\Tests\NextFit;


use BinPacking\NextFit\Item;
use BinPacking\NextFit\NextFit;
use BinPacking\NextFit\Util\Dimensions3D;
use PHPStan\Testing\TestCase;

class NextFitTest extends TestCase
{

    public function test(): void
    {
        $items = [];
        $items[] = new Item(new Dimensions3D(3, 3, 3,)); // 27
        $items[] = new Item(new Dimensions3D(2, 2, 2,)); // 8
        $items[] = new Item(new Dimensions3D(4, 4, 4,)); // 64
        $items[] = new Item(new Dimensions3D(1, 1, 1,)); // 1
        $items[] = new Item(new Dimensions3D(6, 6, 6,)); //
        $items[] = new Item(new Dimensions3D(5, 5, 5,));

        $nextFit = new NextFit();
        $nextFit->run($items, []);
    }
}