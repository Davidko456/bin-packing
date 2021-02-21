<?php


namespace BinPacking\NextFit\Memory;


use BinPacking\NextFit\Block;
use JetBrains\PhpStorm\Pure;

class MemoryBlock extends Block
{
    /**
     * @var Block[]
     */
    private array $allocators;

    public function allocate(Block $block): void
    {
        if ($this->getAvailableSize() < $block->getSize()) {
            throw new MemoryOverSizeException();
        }

        $this->allocators[] = $block;
    }

    #[Pure] public function getAvailableSize(): float|int
    {
        $allocatedSize = 0;
        foreach ($this->allocators as $allocator) {
            $allocatedSize += $allocator->getSize();
        }

        return $allocatedSize ? $this->getSize() - $allocatedSize : $this->getSize();
    }
}