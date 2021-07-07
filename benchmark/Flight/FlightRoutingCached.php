<?php

namespace BenchmarkRouting\Flight;

use BenchmarkRouting\Benchmark;
use Flight\Routing\Router;
use Nyholm\Psr7\Uri;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['flight-routing', 'cached'])]
final class FlightRoutingCached extends Benchmark
{
    public function runRouting(string $route): array
    {
        $router = $this->loadedRoutes();

        return $router->match('GET', new Uri($route))->get('defaults');
    }

    public function loadedRoutes(): Router
    {
        return include __DIR__ . '/../../routes/flight-routing-cached-routes.php';
    }
}
