<?php


namespace BinPacking\NextFit;


use BinPacking\Cargo\Bin;
use BinPacking\Cargo\Box\Box;
use BinPacking\Cargo\Item;
use BinPacking\Cargo\NotEnoughVolumeInBinException;

class NextFit
{
    /**
     * @param Item[] $items
     * @param Bin[] $bins
     */
    public function run(array $items, array $bins): NextFitResponse
    {
        $items = $this->orderBoxesAscending($items);
        $bins = $this->orderBoxesAscending($bins);

        return $this->allocateBins($bins, $items);
    }

    /**
     * @param Box[] $boxes
     */
    private function orderBoxesAscending(array $boxes): array
    {
        usort($boxes, function (Box $boxOne, Box $boxTwo) {
            if ($boxOne->getVolume() === $boxTwo->getVolume()) {
                return 0;
            }
            return $boxOne->getVolume() > $boxTwo->getVolume() ? 1 : -1;
        });

        return $boxes;
    }

    /**
     * @param Item[] $items
     * @param Bin[] $bins
     */
    private function allocateBins(array $bins, array $items): NextFitResponse
    {
        $binIndex = 0;
        $itemIndex = 0;
        $binCount = count($bins);
        $itemCount = count($items);

        do{
            try {
                $bins[$binIndex]->addBox($items[$itemIndex]);
                unset($items[$itemIndex]);
                $itemIndex++;
            } catch (NotEnoughVolumeInBinException) {
                $binIndex++;
            }

            if ($binIndex >= $binCount || $itemIndex >= $itemCount) {
                break;
            }

        } while(true);

        $items = array_values($items);
        return new NextFitResponse($bins,$items);
    }
}