<?php

/**
 * Coin sums
Problem 31

In England the currency is made up of pound, £, and pence, p, and there are eight coins in general circulation:

1p, 2p, 5p, 10p, 20p, 50p, £1 (100p) and £2 (200p).

It is possible to make £2 in the following way:

1×£1 + 1×50p + 2×20p + 1×5p + 1×2p + 3×1p

How many different ways can £2 be made using any number of coins?

Answer:
73682
 */

$count = 1; // £2

for ($a=0; $a<=200; $a+=100)
{
    for ($b=0; $b<=200; $b+=50)
    {
        if ($a + $b > 200)
            continue 2;
        for ($c=0; $c<=200; $c+=20)
        {
            if ($a + $b + $c > 200)
                continue 2;
            for ($d=0; $d<=200; $d+=10)
            {
                if ($a + $b +$c + $d > 200)
                    continue 2;
                for ($e=0; $e<=200; $e+=5)
                {
                    if ($a + $b + $c + $d + $e> 200)
                        continue 2;
                    for ($f=0; $f<=200; $f+=2)
                    {
                        if ($a + $b + $c + $d + $e + $f > 200)
                            continue 2;
                        for ($g=0; $g<=200; $g+=1)
                        {
                            $sum = $a + $b + $c + $d + $e + $f + $g;
                            if ($sum > 200)
                                continue 2;

                            if ($sum == 200)
                                $count++;
                        }
                    }
                }
            }
        }
    }
}

echo $count;