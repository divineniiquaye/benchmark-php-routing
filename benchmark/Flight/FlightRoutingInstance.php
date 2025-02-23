<?php

namespace BenchmarkRouting\Flight;

use BenchmarkRouting\Benchmark;
use Flight\Routing\RouteCollection;
use Flight\Routing\Router;
use Nyholm\Psr7\Uri;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['flight-routing', 'instance'])]
final class FlightRoutingInstance extends Benchmark
{
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->router->setCollection([$this, 'loadedRoutes']);

        // warmup.
        $this->benchAll();
    }

    public function runRouting(string $route, string $method = 'GET'): array
    {
        return $this->router->match($method, new Uri($route))->getDefaults();
    }

    public function loadedRoutes(RouteCollection $routes): void
    {
        $routes->routes(include __DIR__ . '/../../routes/flight-routing-routes.php', false);
    }
}
