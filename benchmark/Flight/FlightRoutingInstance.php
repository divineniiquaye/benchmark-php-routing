<?php

namespace BenchmarkRouting\Flight;

use BenchmarkRouting\Benchmark;
use Flight\Routing\Interfaces\RouteMatcherInterface;
use Nyholm\Psr7\Uri;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['flight-routing', 'instance'])]
final class FlightRoutingInstance extends Benchmark
{
    protected RouteMatcherInterface $router;

    public function __construct()
    {
        $this->router = include __DIR__ . '/../../routes/flight-routing-routes.php';
        
        // warmup.
        $this->benchAll();
    }

    public function runRouting(string $route): array
    {
        return $this->router->match('GET', new Uri($route))->get('defaults');
    }
}
