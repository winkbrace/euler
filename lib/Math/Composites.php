<?php namespace Math; 

class Composites
{
    /** @var array */
    protected $composites = array();

    /** @var \Math\Composites */
    protected static $instance;

    protected function __construct()
    {
        $this->readFirst100kComposites();
    }

    /**
     * It is handy to have only 1 Composites instance, so the file with first 100k composites will only be read once.
     * @return Composites
     */
    public static function getInstance()
    {
        if (empty(static::$instance))
            static::$instance = new static();

        return static::$instance;
    }

    protected function readFirst100kComposites()
    {
        $lines = file(realpath(__DIR__ . '/../../resources/first_100k_composites.txt'));
        foreach ($lines as $line)
        {
            // line looks like: 28 = 2 * 2 * 7
            list($n, $factors) = explode(' = ', $line);
            $this->composites[$n] = explode(' * ', $factors);
        }
    }

    /**
     * @return array
     */
    public function getCompositesWithFactors()
    {
        return $this->composites;
    }

    /**
     * @return int[]
     */
    public function getCompositeNumbers()
    {
        return array_keys($this->composites);
    }
} 