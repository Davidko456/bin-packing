<?php


namespace BinPacking\NextFit;


use BinPacking\NextFit\Box\Box;
use BinPacking\NextFit\Util\Dimensions3D;
use JetBrains\PhpStorm\Pure;

class Bin extends Box
{
    /**
     * @var Box[]
     */
    private array $boxes = [];

    /**
     * @throws NotEnoughVolumeInBinException
     */
    public function addBox(Box $box): void
    {
        if ($box->getVolume() > $this->getAvailableVolume()) {
            throw new NotEnoughVolumeInBinException();
        }

        $this->boxes[] = $box;
    }

    /**
     * @return Box[]
     */
    public function getBoxes(): array
    {
        return $this->boxes;
    }

    #[Pure] public function getAvailableVolume(): float
    {
        $allocatedVolume = 0;
        foreach ($this->boxes as $box) {
            $allocatedVolume += $box->getVolume();
        }

        return $this->getVolume() - $allocatedVolume;
    }
}