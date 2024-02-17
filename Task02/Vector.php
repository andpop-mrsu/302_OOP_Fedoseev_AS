<?php

namespace Fedoseev\Task02;

class Vector
{
    private $x;
    private $y;
    private $z;
    public function __construct($x, $y, $z)
    {
        if (is_numeric($x) && is_numeric($y) && is_numeric($z)) {
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        } else {
            exit('Координаты должны быть числами.');
        }
    }

    public function add(Vector $vector): Vector
    {
        $addX = $this->x + $vector->x;
        $addY = $this->y + $vector->y;
        $addZ = $this->z + $vector->z;
        return new Vector($addX, $addY, $addZ);
    }

    public function sub(Vector $vector): Vector
    {
        $subX = $this->x - $vector->x;
        $subY = $this->y - $vector->y;
        $subZ = $this->z - $vector->z;
        return new Vector($subX, $subY, $subZ);
    }

    public function prod($number): Vector
    {
        $prodX = $this->x * $number;
        $prodY = $this->y * $number;
        $prodZ = $this->z * $number;
        return new Vector($prodX, $prodY, $prodZ);
    }

    public function scalarProd(Vector $vector): float
    {
        $scalProdX = $this->x * $vector->x;
        $scalProdY = $this->y * $vector->y;
        $scalProdZ = $this->z * $vector->z;
        return ($scalProdX + $scalProdY + $scalProdZ);
    }

    public function vectorProd(Vector $vector): Vector
    {
        $vectProdX = $this->y * $vector->z - $this->z * $vector->y;
        $vectProdY = $this->z * $vector->x - $this->x * $vector->z;
        $vectProdZ = $this->x * $vector->y - $this->y * $vector->x;
        return new Vector($vectProdX, $vectProdY, $vectProdZ);
    }

    public function __toString()
    {
        return "({$this->x}; {$this->y}; {$this->z})";
    }
}
