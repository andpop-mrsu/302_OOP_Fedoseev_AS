<?php
require_once 'Vector.php';
function runTest()
{
    echo "String representation test" . PHP_EOL;
    $v1 = new \Fedoseev\Task02\Vector(1, 2, 3);
    echo "Ожидается: (1; 2; 3)" . PHP_EOL;
    echo "Получено: " . $v1 . PHP_EOL;
    echo PHP_EOL;

    echo "Adding test" . PHP_EOL;
    $v2 = new \Fedoseev\Task02\Vector(1, 4, -2);
    $v3 = $v1->add($v2);
    echo "Ожидается: (2; 6; 1)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;
    echo PHP_EOL;

    echo "Subtract test" . PHP_EOL;
    $v4 = $v1->sub($v2);
    echo "Ожидается: (0; -2; 5)" . PHP_EOL;
    echo "Получено: " . $v4 . PHP_EOL;
    echo PHP_EOL;

    echo "Product test" . PHP_EOL;
    $v5 = $v1->prod(2);
    echo "Ожидается: (2; 4; 6)" . PHP_EOL;
    echo "Получено: " . $v5 . PHP_EOL;
    echo PHP_EOL;

    echo "ScalarProduct test" . PHP_EOL;
    $v6 = $v1->scalarProd($v2);
    echo "Ожидается: 3" . PHP_EOL;
    echo "Получено: " . $v6 . PHP_EOL;
    echo PHP_EOL;

    echo "VectorProduct test" . PHP_EOL;
    $v7 = $v1->vectorProd($v2);
    echo "Ожидается: (-16; 5; 2)" . PHP_EOL;
    echo "Получено: " . $v7 . PHP_EOL;
    echo PHP_EOL;
}
