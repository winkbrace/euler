<?php namespace Paths;

/**
 * Class Triangle
 *
    $grid = array(
            [75],
          [95, 64],
        [17, 47, 82],
        etc...
    );
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
    protected $rowsPerStep = 8;
    /** @var int */
    protected $topSize = 8;
    /** @var array */
    protected $routes = array();

    /**
     * @param array $grid
     */
    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @return array
     */
    public function findBestRoute()
    {
        $bestRoutes = array();

        $routes = $this->findTopRoutesFrom(0, 0);
        foreach ($routes as $route)
        {
            $endPoint = end($route);
            // this smells like we need recursion!
            foreach ($this->findTopRoutesFrom($endPoint['x'], $endPoint['y']) as $continuedRoute)
            {
                $bestRoutes[] = $this->addContinuedRouteToRoute($route, $continuedRoute);
            }
        }

        $totals = $this->calcRouteValues($bestRoutes);
        $best = key($totals);

        return $bestRoutes[$best] + array('total' => $totals[$best]);
    }

    /**
     * @param int $row
     * @param int $pos
     * @return array
     */
    public function findTopRoutesFrom($row, $pos)
    {
        $this->routes = array();
        $this->traverse($row, $pos);

        $bestRoutes = array();
        $totals = $this->calcRouteValues($this->routes);
        $i = 0;
        foreach ($totals as $key => $total)
        {
            if (++$i > $this->topSize)
                break;

            $bestRoutes[] = $this->routes[$key]; // + array('total' => $total);
        }

        return $bestRoutes;
    }

    /**
     * @param int $x
     * @param int $y
     * @param int $level
     * @param array $route
     */
    protected function traverse($x, $y, $level = 1, $route = array())
    {
        if (empty($this->grid[$x]))
        {
            if (! in_array($route, $this->routes))
                $this->routes[] = $route;

            return;
        }

        $route[$level] = ['x' => $x, 'y' => $y, 'value' => (int) $this->grid[$x][$y]];

        if ($level == $this->rowsPerStep)
        {
            $this->routes[] = $route;
        }
        else
        {
            for ($i = $y; $i <= $y + 1; $i++)
                $this->traverse($x + 1, $i, $level + 1, $route);
        }
    }

    /**
     * calculates sum of values of route and returns sorted array high to low
     *
     * @param array $routes
     * @return array
     */
    protected function calcRouteValues(array $routes)
    {
        $totals = array();

        foreach ($routes as $i => $route)
        {
            $sum = 0;
            foreach ($route as $pos)
                $sum += $pos['value'];

            $totals[$i] = $sum;
        }
        arsort($totals);

        return $totals;
    }

    /**
     * @param array $route
     * @param array $continuedRoute
     * @return array
     */
    protected function addContinuedRouteToRoute(array $route, array $continuedRoute)
    {
        array_shift($continuedRoute); // end point of route == start point of continued route
        foreach ($continuedRoute as $point)
            $route[] = $point;

        return $route;
    }

    /**
     * @param int $rowsPerStep
     */
    public function setRowsPerStep($rowsPerStep)
    {
        $this->rowsPerStep = $rowsPerStep;
    }

    /**
     * set the amount of best options to continue with on the next depth level
     * @param int $topSize
     */
    public function setTopSize($topSize)
    {
        $this->topSize = $topSize;
    }
} 