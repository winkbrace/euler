<?php namespace Math;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAllProducts()
    {
        $p = new Product();
        $numbers = array(2, 3, 5);
        $expected = array(6, 10, 15, 30);
        $this->assertEquals($expected, $p->getAllProducts($numbers));
    }

    public function testGetAllProductsOfFiveNumbers()
    {
        $p = new Product();
        $numbers = array(2, 3, 4, 5, 6);
        $expected = array(6, 8, 10, 12, 15, 18, 20, 24, 30, 36, 40, 48, 60, 72, 90, 120, 144, 180, 240, 360, 720);
        $this->assertEquals($expected, $p->getAllProducts($numbers));
    }

    public function testGetAllProductsWithCombinationSize()
    {
        $p = new Product();
        $numbers = array(2, 3, 4, 5, 6);
        $expected = array(24, 30, 36, 40, 48, 60, 72, 90, 120);
        $this->assertEquals($expected, $p->getAllProducts($numbers, 3));
    }
}