<?php namespace Math\Paths; 

use Paths\Triangle;

class TriangleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * this tests the entire class
     */
    public function testFindTopRoutes()
    {
        $grid = array(
            [75],
            [95, 64],
            [17, 47, 82],
        );
        $t = new Triangle($grid);
        $t->setRowsPerStep(4); // bigger than amount of rows available should be handled gracefully
        $t->setTopSize(2);

        $top = $t->findTopRoutesFrom(0,0);
        $expected = array(
            0 => array(
                1 => ['x' => 0, 'y' => 0, 'value' => 75],
                2 => ['x' => 1, 'y' => 1, 'value' => 64],
                3 => ['x' => 2, 'y' => 2, 'value' => 82],
//                'total' => 221
            ),
            1 => array(
                1 => ['x' => 0, 'y' => 0, 'value' => 75],
                2 => ['x' => 1, 'y' => 0, 'value' => 95],
                3 => ['x' => 2, 'y' => 1, 'value' => 47],
//                'total' => 217
            ),
        );
        $this->assertEquals($expected, $top);
    }

    // TODO make findBestRoute look at size of grid and implement recursion
//    public function testFindBestRoute()
//    {
//        $grid = array(
//            [75],
//            [95, 64],
//            [17, 47, 82],
//        );
//        $t = new Triangle($grid);
//        $t->setRowsPerStep(3);
//        $t->setTopSize(3);
//
//        $best = $t->findBestRoute();
//        $expected = array(
//            0 => array(
//                1 => ['x' => 0, 'y' => 0, 'value' => 75],
//                2 => ['x' => 1, 'y' => 1, 'value' => 64],
//                3 => ['x' => 2, 'y' => 2, 'value' => 82],
//                'total' => 221
//            )
//        );
//        $this->assertEquals($expected, $best);
//    }
}