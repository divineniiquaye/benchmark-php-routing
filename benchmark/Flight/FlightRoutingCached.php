<?php

namespace BenchmarkRouting\Flight;

use BenchmarkRouting\Benchmark;
use Flight\Routing\RouteCollection;
use Flight\Routing\Router;
use Nyholm\Psr7\Uri;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['flight-routing', 'cached'])]
final class FlightRoutingCached extends Benchmark
{
    public function runRouting(string $route, string $method = 'GET'): array
    {
        $router = new Router();
        $router->setCollection([$this, 'loadedRoutes']);

        return $router->match($method, new Uri($route))->get('defaults');
    }

    public function loadedRoutes(RouteCollection $routes): void
    {
        include __DIR__ . '/../../routes/flight-routing-routes.php';
    }
}
