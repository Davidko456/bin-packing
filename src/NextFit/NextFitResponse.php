<?php declare(strict_types=1);


namespace BinPacking\NextFit;


use BinPacking\Cargo\Bin;
use BinPacking\Cargo\Item;

class NextFitResponse
{
    /**
     * @var Bin[]
     */
    private array $bins = [];

    /**
     * @var Item[]
     */
    private array $unallocatedItems = [];

    public function __construct(array $bins, array $unallocatedItems)
    {
        $this->bins = $bins;
        $this->unallocatedItems = $unallocatedItems;
    }

    /**
     * @return Bin[]
     */
    public function getBins(): array
    {
        return $this->bins;
    }

    /**
     * @return Item[]
     */
    public function getUnallocatedItems(): array
    {
        return $this->unallocatedItems;
    }
}