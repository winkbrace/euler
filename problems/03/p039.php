<?php
/**
 * Integer right triangles
 * Problem 39
 *
 * If p is the perimeter of a right angle triangle with integral length sides, {a,b,c}, there are exactly three
 * solutions for p = 120.
 *
 * {20,48,52}, {24,45,51}, {30,40,50}
 *
 * For which value of p ≤ 1000, is the number of solutions maximised?
 *
 * Answer: 840
 */

// pythagoras: a^2 + b^2 = c^2
// and: a + b + c = p

$pyt = new \Math\Pythagoras();
$log = new \Util\Log();

// collect pythagoras combinations per perimeter
$results = array();
for ($i=12; $i<=1000; $i+=2) // if (a and b are even | a and b are odd | a odd b even | a even b odd) p is always even.
{
    $lengths = $pyt->findLengthsForPerimeter($i);
    if (! empty($lengths))
        $results[$i] = $lengths;
    if ($i % 100 == 0)
        $log->log($i.' perimeters processed. Found '.count($results).' results so far…');
}

// find perimeter with the most solutions
$max = 0;
$answer = 0;
foreach ($results as $i => $lengths)
{
    if (count($lengths) > $max)
    {
        $max = count($lengths);
        $answer = $i;
    }
}

print_r($results[$answer]);

$log->solution($answer.'. It has '.$max.' solutions.');