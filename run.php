<?php require_once 'bootstrap.php';

$starttime = microtime(true);

if (empty($argv[1]) || ! is_numeric($argv[1]))
    die('Please provide number of puzzle to run.');

$nr = str_pad($argv[1], 3, '0', STR_PAD_LEFT);
require __DIR__ . '/problems/' . substr($nr, 0, 2) . '/p' . $nr . '.php';

echo PHP_EOL.PHP_EOL.'script duration: '.(microtime(true) - $starttime).PHP_EOL;
