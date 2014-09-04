<?php
/**
 * Cubic permutations
 *
 * The cube, 41063625 (345^3), can be permuted to produce two other cubes: 56623104 (384^3) and 66430125 (405^3).
 * In fact, 41063625 is the smallest cube which has exactly three permutations of its digits which are also cube.
 *
 * Find the smallest cube for which exactly five permutations of its digits are cube.
 *
 * The solution is: 127035954683
 */
$log = new \Util\Log();
$cube = new \Sequence\Cube();
$sorter = new \String\Sorter();

// generating all permutations takes WAY too long, because 10! = 3.6M
// so better just search in the cubes sequence. Then it's really fast.

$cubes = [];
foreach ($cube->createSequenceOfLength(10000) as $c) {
    $cubes[strlen($c)][] = $c;
}
unset($cubes[1], $cubes[2], $cubes[3]);

foreach ($cubes as $len => $nrs) {
    $log->log("There are ".count($nrs)." cubes of length $len");
    $sorted = [];
    foreach ($nrs as $i => $nr) {
        $sorted[$i] = $sorter->sortCharacters($nr);
    }
    foreach (array_count_values($sorted) as $key => $count) {
        if ($count == 5) {
            $found = [];
            foreach ($sorted as $i => $nr) {
                if ($nr == $key) {
                    $found[] = $nrs[$i];
                }
            }
            break 2;
        }
    }
}

sort($found);
print_r($found);
$log->solution($found[0]);

