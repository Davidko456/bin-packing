<?php declare(strict_types=1);


namespace BinPacking\NextFit;


use BinPacking\NextFit\Box\Box;
use BinPacking\Util\Dimensions3D;
use BinPacking\Util\IdentificationGenerator\IntegerIdGenerator;
use JetBrains\PhpStorm\Pure;

class Bin extends Box
{
    private int $id;

    /**
     * @var Box[]
     */
    private array $boxes = [];

    public function __construct(Dimensions3D $dimensions)
    {
        parent::__construct($dimensions);
        $idGenerator = IntegerIdGenerator::getInstance();
        $this->id = $idGenerator->generate();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

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