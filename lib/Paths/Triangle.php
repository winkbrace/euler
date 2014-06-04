<?php namespace Paths;

/**
 * Class Triangle
 *
    Array
    (
        [0] => Array
        (
            [0] => 75
        )
        [1] => Array
        (
            [0] => 95
            [1] => 64
        )
        [2] => Array
        (
            [0] => 17
            [1] => 47
            [2] => 82
        )
        etc...
    )
 *
 * path can go from [0,0] to [1,0] and [1,1]
 * and from [4,7] to [5,7] and [5,8]
 * etc
 */
class Triangle
{
    /** @var array */
    protected $grid;
    /** @var int */
    protected $rowsPerStep;
    /** @var int */
    protected $depth;

    /**
     * @param array $grid
     */
    public function __construct(array $grid)
    {
        $this->grid = $grid;
        $this->rowsPerStep = 8;
        $this->depth = 8;
    }

    protected function findBestRoutesFrom($x, $y)
    {

    }

    protected function getAllRoutesFrom($x, $y)
    {

    }

    /**
     * @param int $rowsPerStep
     */
    public function setRowsPerStep($rowsPerStep)
    {
        $this->rowsPerStep = $rowsPerStep;
    }

    /**
     * set the amount of best options to continue with
     * @param int $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }
} 