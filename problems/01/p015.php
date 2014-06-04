<?php

/**
 * Lattice paths
 * Problem 15
 *
 * Starting in the top left corner of a 2×2 grid, and only being able to move to the right and down,
 * there are exactly 6 routes to the bottom right corner.
 *
 * How many such routes are there through a 20×20 grid?
 */

// 2x2 => 4 boven 2 = 6
// routes: rrdd, rdrd, rddr, drrd, drdr, ddrr => 6

// 2x3 => 5 boven 2 = 10
// routes: rrrdd, rrdrd, rrddr, rdrrd, rdrdr, rddrr, drrrd, drrdr, drdrr, ddrrrr => 10

// 2x4 => 6 boven 2 = 15
// routes: rrrrdd, rrrdrd, rrrddr, rrdrrd, rrdrdr, rrddrr, rdrrrd, rdrrdr, rdrdrr, rddrrrr
//         drrrrd, drrrdr, drrdrr, drdrrr, ddrrrr

$c = new \Math\Combinations();
echo $c->nCr(4, 2).PHP_EOL;
echo $c->nCr(5, 2).PHP_EOL;
echo $c->nCr(6, 2).PHP_EOL;

echo $c->nCr(40, 20).PHP_EOL;
