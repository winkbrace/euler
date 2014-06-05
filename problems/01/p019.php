<?php

/**
 * Counting Sundays
 * Problem 19
 *
 * You are given the following information, but you may prefer to do some research for yourself.
 *
 * 1 Jan 1900 was a Monday.
 * Thirty days has September,
 * April, June and November.
 * All the rest have thirty-one,
 * Saving February alone,
 * Which has twenty-eight, rain or shine.
 * And on leap years, twenty-nine.
 * A leap year occurs on any year evenly divisible by 4, but not on a century unless it is divisible by 400.
 *
 * How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?
 */

$months = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$count = 0;
$totalRemainders = 1; // jan 1 1900 is monday, so remainder = 1

for ($year = 1900; $year < 2001; $year++) {
    $months[1] = ($year % 4 == 0 && $year != 1900) ? 29 : 28;

    foreach ($months as $month) {
        $totalRemainders += $month % 7;
        if ($totalRemainders % 7 == 0 && $year != 1900)
            $count++;
    }
}

echo $count;