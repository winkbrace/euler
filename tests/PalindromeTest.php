<?php namespace String;

class PalindromeTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $p = new Palindrome();
        $this->assertInstanceOf('\\String\\Palindrome', $p);
    }

    public function testIsPalindrome()
    {
        $p = new Palindrome();
        $this->assertTrue($p->isPalindrome(12321));
        $this->assertFalse($p->isPalindrome(12320));
        $this->assertTrue($p->isPalindrome(null)); // will convert to "".
    }
}
