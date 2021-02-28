<?php declare(strict_types=1);


namespace BinPacking\Cargo;



use BinPacking\Cargo\Box\Box;
use BinPacking\Util\Dimensions3D;
use BinPacking\Util\IdentificationGenerator\IntegerIdGenerator;

class Item extends Box
{
    private int $id;

    public function __construct(Dimensions3D $dimensions)
    {
        parent::__construct($dimensions);
        $idGenerator = IntegerIdGenerator::getInstance();
        $this->id = $idGenerator->generate();
    }

    public function getId(): int
    {
        return $this->id;
    }
}