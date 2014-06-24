<?php namespace Sequence;

/**
 * Pn=n(3n−1)/2
 * 1, 5, 12, 22, 35, 51, 70, 92, 117, 145, ...
 */
class Pentagonal implements SequenceInterface
{
    protected $sequence = array();
    protected $index = 0;

    /**
     * @param int $x
     * @return int
     */
    public function getNumberAt($x)
    {
        return $x * ((3 * $x) - 1) / 2;
    }

    public function getIndexOf($n)
    {
        // 0 = 1.5x^2 - 0.5x - y
        // a = 1.5, b = -0.5, c=-y
        // D = b^2 - 4ac = -0.25 - 4*1.5*-y = -0.25 + 6y = 6y - 0.25
        // x = (-b +/- sqrt(D)) / 2
        // x = (-0.25 +/- sqrt(6y - 0.25)) / 2 = -0.125 +/- 0.5sqrt(6y - 0.25)
        return -0.125 + (0.5 * sqrt((6 * $n) - 0.25));
    }

    public function createSequenceOfLength($n)
    {
        for ($i=1; $i<=$n; $i++)
            $this->sequence[$this->index + 1] = $this->next();

        return $this->sequence;
    }

    public function next()
    {
        return $this->getNumberAt(++$this->index);
    }

    public function isPentagonal()
    {

    }

    public function createSequenceTo($n)
    {
        // TODO: Implement createSequenceTo() method.
    }

    public function getSequence()
    {
        // TODO: Implement getSequence() method.
    }
}