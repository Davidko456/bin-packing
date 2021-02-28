<?php


namespace BinPacking\Tests\NextFit;


use BinPacking\NextFit\Bin;
use BinPacking\NextFit\Item;
use BinPacking\NextFit\NextFit;
use BinPacking\NextFit\NextFitResponse;
use BinPacking\NextFit\Util\Dimensions3D;
use PHPStan\Testing\TestCase;

class NextFitTest extends TestCase
{

    public function test(): void
    {
        $items = [];
        $items[] = new Item(new Dimensions3D(1, 1, 1,)); // 1
        $items[] = new Item(new Dimensions3D(2, 2, 2,)); // 8
        $items[] = new Item(new Dimensions3D(3, 3, 3,)); // 27
        $items[] = new Item(new Dimensions3D(4, 4, 4,)); // 64
        $items[] = new Item(new Dimensions3D(5, 5, 5,)); // 125
        $items[] = new Item(new Dimensions3D(6, 6, 6,)); // 216
        $shuffledItems = $items;
        shuffle($shuffledItems);

        $bins = [];
        $bins[] = new Bin(new Dimensions3D(1, 1, 1,)); // 1
        $bins[] = new Bin(new Dimensions3D(6, 3, 2,)); // 36
        $bins[] = new Bin(new Dimensions3D(9, 4, 2,)); // 72
        $bins[] = new Bin(new Dimensions3D(14, 6, 2,)); // 168
        $shuffledBins = $bins;
        shuffle($shuffledBins);

        $nextFit = new NextFit();
        $response = $nextFit->run($shuffledItems, $shuffledBins);

        self::assertInstanceOf(NextFitResponse::class, $response);

        $binBoxIds = [];
        foreach($response->getBins() as $binKey => $bin){
            foreach($bin->getBoxes() as $boxKey => $box){
                $binBoxIds[$binKey][$boxKey] = $box->getId();
            }
        }

        self::assertSame($items[0]->getId(), $binBoxIds[0][0]);
        self::assertSame($items[1]->getId(), $binBoxIds[1][0]);
        self::assertSame($items[2]->getId(), $binBoxIds[1][1]);
        self::assertSame($items[3]->getId(), $binBoxIds[2][0]);
        self::assertSame($items[4]->getId(), $binBoxIds[3][0]);
        self::assertSame($items[5]->getId(), $response->getUnallocatedItems()[0]->getId());
    }
}