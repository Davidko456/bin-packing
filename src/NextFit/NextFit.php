<?php


namespace BinPacking\NextFit;


use BinPacking\NextFit\Box\Box;

class NextFit
{
    /**
     * @param Item[] $items
     * @param Bin[] $bins
     * @return Bin[]
     */
    public function run(array $items, array $bins): array
    {
        $items = $this->orderBoxesAscending($items);
        $bins = $this->orderBoxesAscending($bins);

        return $this->allocateBins($items, $bins);
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
     * @return Bin[]
     */
    private function allocateBins(array $items, array $bins): array
    {
        $index = 0;
        foreach ($items as $item) {
            $allocated = false;

            do {
                try {
                    $bins[$index]->addBox($item);
                    $allocated = true;
                } catch (NotEnoughVolumeInBinException) {
                    $index++;
                }
            }
            while ($allocated);
        }

        return $bins;
    }
}