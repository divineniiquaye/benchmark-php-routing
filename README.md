# Benchmark PHP Routing

Take a real world routing scenario in the form of [Bitbucket API](https://developer.atlassian.com/bitbucket/api/2/reference/resource/) and benchmark PHP routing packages against it.

You can read more about this here: http://kaloyan.info/writing/2021/05/31/benchmark-php-routing.html

# Packages
Here are the packages that are benchmarked:

* Symfony Routing [symfony/routing](https://github.com/symfony/routing)
* Fast Route [nikic/FastRoute](https://github.com/nikic/FastRoute)
* Hack Routing [azjezz/hack-routing](https://github.com/azjezz/hack-routing)
* Flight Routing [divineniiquaye/flight-routing](https://github.com/divineniiquaye/flight-routing)

So far these are the most popular ones: **Symfony Routing** component is used not only by
them but by **Laravel** as well, and **FastRoute** is used by other popular solutions such
as the [Slim](https://github.com/slimphp/Slim) framework and [League\Route](https://github.com/thephpleague/route).

**Hack Routing** is a PHP rewrite of [hhvm/hack-router](https://github.com/hhvm/hack-router) by Facebook, Inc.
It implements the same algorithm used to route HTTP requests throughout facebook.com.

**Flight Routing** is an easy to use fast PHP router which competes with **FastRoute** and **Symfony**, offering some functionalities such as PSR-7, PSR-15 and PSR-17. Flight is faster than both **FastRoute** and **Symfony** when not compiled and even still fast enough when compiled.

# Benchmarks

This is the list of the available [phpbench](https://github.com/phpbench/phpbench)
benchmarks. They are combination of the packages and the strategies they provide.

| Package | File | Strategy |
|---------|------|----------|
| [symfony/routing](https://github.com/symfony/routing) | benchmark/Symfony/Symfony.php | `Symfony\Component\Routing\Matcher\UrlMatcher` |
| [symfony/routing](https://github.com/symfony/routing) | benchmark/Symfony/SymfonyCached.php | `Symfony\Component\Routing\Matcher\CompiledUrlMatcher` |
| [symfony/routing](https://github.com/symfony/routing) | benchmark/Symfony/SymfonyInstance.php | `Symfony\Component\Routing\Matcher\CompiledUrlMatcher` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBased.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedApcuCached.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedFilesCached.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedInstance.php | `FastRoute\Dispatcher\MarkBased` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRouting.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingFilesCached.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingApcuCached.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingInstance.php | `HackRouting\PrefixMatchingResolver` |
| [divineniiquaye/flight-routing](https://github.com/divineniiquaye/flight-routing) | benchmark/Flight/FlightRouting.php | `Flight\Routing\RouteMatcher` |
| [divineniiquaye/flight-routing](https://github.com/divineniiquaye/flight-routing) | benchmark/Flight/FlightRoutingCached.php | `Flight\Routing\RouteMatcher` |
| [divineniiquaye/flight-routing](https://github.com/divineniiquaye/flight-routing) | benchmark/Flight/FlightRoutingInstance.php | `Flight\Routing\RouteMatcher` |

The benchmark cases are:

* **benchLast** -- match the last route in the list of routing definitions, as this is considered the worst case
* **benchLongest** -- match the longest route to test the complexity of parsing bigger paths
* **benchAll** -- match all the routes from the list of routing definitions to average the overall performance
* **benchInvalidMethod** -- match a valid route with using an invalid method, requiring routers to provide a list of allowed methods
* **benchInvalidRoute** -- match a non-registered route, requiring routers to go over all possibilities

### Running the benchmarks

To run the benchmarks, first you have to run `composer update` to get all the packages and their dependencies.

After that, you can execute any of benchmark files like this:

```sh
php vendor/bin/phpbench run benchmark/Symfony/Symfony.php --report=default 
```

Or you can run all the benchmarks at once

```sh
php vendor/bin/phpbench run --report=default
```

### Quick Benchmark

In addition to the phpbench running its own cases, there is also a script that
will run all the scenarios against all the packages and strategies, and
calculate the number of routes matched per second. The results are then sorted
by that data. Here's how to run this:

```sh
php scripts/quick-benchmark.php
```

# Routes

All the routes for this benchmark are read from this address:
https://developer.atlassian.com/bitbucket/api/2/reference/resource/

Only the paths are used, and the HTTP verbs/methods are ignored.

You can see the list of paths in [bitbucket-routes.txt](routes/bitbucket-routes.txt):

```
/addon
/addon/linkers
/addon/linkers/{linker_key}
/addon/linkers/{linker_key}/values
/addon/linkers/{linker_key}/values/{value_id}
/hook_events
/hook_events/{subject_type}
/pullrequests/{selected_user}
/repositories
/repositories/{workspace}
/repositories/{workspace}/{repo_slug}
...
```

# Scripts

There are a few scripts to assist with some grunt work:

* [scripts/download-bitbucket-routes.php](scripts/download-bitbucket-routes.php):
	downloads the path definitions from [Bitbucket API](https://developer.atlassian.com/bitbucket/api/2/reference/resource/) page
* [scripts/generate-routes.php](scripts/generate-routes.php):
	generates the routes definitions for the packages, as well as the expected results
* [scripts/quick-benchmark.php](scripts/quick-benchmark.php):
	runs the benchmark cases to calculate number of matches per second (more is better)

# Results

Here are the results from the benchmarks executed by GitHub Actions:

https://github.com/divineniiquaye/benchmark-php-routing/actions

## Cached - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a traditional web server with PHP fpm/fast-cgi

```sh
+------------------------------ Benchmark results for group cached. -------------+-----------------+
| Case                          | Scenario           | Routes | Time             | Per Second      |
+-------------------------------+--------------------+--------+------------------+-----------------+
| fast-route(mark):cached(file) | benchAll           | 364    | 0.004945 seconds | 73609.115086062 |
| fast-route(mark):cached(file) | benchInvalidRoute  | 300    | 0.004779 seconds | 62773.320029933 |
| fast-route(mark):cached(file) | benchLast          | 300    | 0.004854 seconds | 61805.157424235 |
| fast-route(mark):cached(file) | benchInvalidMethod | 300    | 0.004858 seconds | 61756.623312884 |
| symfony:cached(file)          | benchAll           | 364    | 0.006521 seconds | 55819.774633469 |
| symfony:cached(file)          | benchInvalidRoute  | 300    | 0.005840 seconds | 51371.4052421   |
| symfony:cached(file)          | benchLast          | 300    | 0.006496 seconds | 46182.602950892 |
| symfony:cached(file)          | benchInvalidMethod | 300    | 0.007457 seconds | 40230.559196854 |
| flight-routing:cached(file)   | benchAll           | 364    | 0.026960 seconds | 13501.535718708 |
| flight-routing:cached(file)   | benchInvalidRoute  | 300    | 0.023078 seconds | 12999.413198892 |
| flight-routing:cached(file)   | benchLast          | 300    | 0.024354 seconds | 12318.314602342 |
| flight-routing:cached(file)   | benchInvalidMethod | 300    | 0.025549 seconds | 11742.062877353 |
| fast-route(mark):cached(apcu) | benchInvalidRoute  | 300    | 0.026067 seconds | 11508.796063403 |
| fast-route(mark):cached(apcu) | benchAll           | 364    | 0.032235 seconds | 11292.106358587 |
| fast-route(mark):cached(apcu) | benchInvalidMethod | 300    | 0.028487 seconds | 10531.13162542  |
| fast-route(mark):cached(apcu) | benchLast          | 300    | 0.028559 seconds | 10504.5807071   |
| fast-route(mark):cached(file) | benchLongest       | 300    | 0.046382 seconds | 6468.0333093451 |
| symfony:cached(file)          | benchLongest       | 300    | 0.049337 seconds | 6080.640204123  |
| hack-routing:cached(apcu)     | benchInvalidRoute  | 300    | 0.058426 seconds | 5134.7088012536 |
| hack-routing:cached(apcu)     | benchLast          | 300    | 0.058867 seconds | 5096.2358144395 |
| hack-routing:cached(apcu)     | benchAll           | 364    | 0.072337 seconds | 5032.0090968119 |
| hack-routing:cached(file)     | benchInvalidRoute  | 300    | 0.060012 seconds | 4998.9916927881 |
| hack-routing:cached(file)     | benchLast          | 300    | 0.060620 seconds | 4948.8755516051 |
| hack-routing:cached(apcu)     | benchInvalidMethod | 300    | 0.060987 seconds | 4919.0814627167 |
| hack-routing:cached(file)     | benchAll           | 364    | 0.074916 seconds | 4858.7670970432 |
| hack-routing:cached(file)     | benchInvalidMethod | 300    | 0.062843 seconds | 4773.8130828357 |
| flight-routing:cached(file)   | benchLongest       | 300    | 0.069627 seconds | 4308.6704766862 |
| fast-route(mark):cached(apcu) | benchLongest       | 300    | 0.070245 seconds | 4270.764928096  |
| hack-routing:cached(apcu)     | benchLongest       | 300    | 0.104296 seconds | 2876.4294809223 |
| hack-routing:cached(file)     | benchLongest       | 300    | 0.106674 seconds | 2812.3078160935 |
+-------------------------------+--------------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+--------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                      | Scenario           | Routes | Time             | Per Second      |
+---------------------------+--------------------+--------+------------------+-----------------+
| flight-routing:instance   | benchAll           | 364    | 0.000413 seconds | 881481.9030023  |
| fast-route(mark):instance | benchAll           | 364    | 0.000729 seconds | 499256.5912361  |
| flight-routing:instance   | benchLast          | 300    | 0.000858 seconds | 349622.45068075 |
| hack-routing:instance     | benchInvalidRoute  | 300    | 0.000895 seconds | 335186.78742674 |
| fast-route(mark):instance | benchInvalidMethod | 300    | 0.000904 seconds | 331915.37852809 |
| hack-routing:instance     | benchLast          | 300    | 0.000942 seconds | 318474.10782081 |
| hack-routing:instance     | benchAll           | 364    | 0.001148 seconds | 317077.18712358 |
| fast-route(mark):instance | benchLast          | 300    | 0.000984 seconds | 304892.46425975 |
| fast-route(mark):instance | benchInvalidRoute  | 300    | 0.001409 seconds | 212908.83248731 |
| hack-routing:instance     | benchInvalidMethod | 300    | 0.002127 seconds | 141032.4142569  |
| flight-routing:instance   | benchInvalidRoute  | 300    | 0.004623 seconds | 64893.821557504 |
| flight-routing:instance   | benchInvalidMethod | 300    | 0.006120 seconds | 49017.966497857 |
| symfony:instance          | benchInvalidRoute  | 300    | 0.008648 seconds | 34689.471507733 |
| symfony:instance          | benchInvalidMethod | 300    | 0.010012 seconds | 29964.308337104 |
| symfony:instance          | benchAll           | 364    | 0.012503 seconds | 29112.67030243  |
| symfony:instance          | benchLast          | 300    | 0.010993 seconds | 27290.084150256 |
| fast-route(mark):instance | benchLongest       | 300    | 0.037936 seconds | 7908.0614649782 |
| flight-routing:instance   | benchLongest       | 300    | 0.043426 seconds | 6908.297921402  |
| hack-routing:instance     | benchLongest       | 300    | 0.045520 seconds | 6590.5344534998 |
| symfony:instance          | benchLongest       | 300    | 0.050781 seconds | 5907.7200445089 |
+---------------------------+--------------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment but doesn't mean it can't be served for production.

```sh
+------------------+------ Benchmark results for group raw. --------+-----------------+
| Case             | Scenario           | Routes | Time             | Per Second      |
+------------------+--------------------+--------+------------------+-----------------+
| flight-routing   | benchInvalidRoute  | 300    | 0.086190 seconds | 3480.6731801232 |
| flight-routing   | benchLast          | 300    | 0.104715 seconds | 2864.916087403  |
| flight-routing   | benchInvalidMethod | 300    | 0.106011 seconds | 2829.8973106453 |
| flight-routing   | benchAll           | 364    | 0.159484 seconds | 2282.3619065844 |
| flight-routing   | benchLongest       | 300    | 0.220737 seconds | 1359.0835545744 |
| fast-route(mark) | benchAll           | 364    | 0.275296 seconds | 1322.2133119709 |
| fast-route(mark) | benchLast          | 300    | 0.229985 seconds | 1304.432905154  |
| fast-route(mark) | benchInvalidMethod | 300    | 0.234520 seconds | 1279.2088226683 |
| fast-route(mark) | benchInvalidRoute  | 300    | 0.236769 seconds | 1267.057974123  |
| fast-route(mark) | benchLongest       | 300    | 0.271809 seconds | 1103.7158019385 |
| symfony          | benchAll           | 364    | 0.394430 seconds | 922.85032036558 |
| symfony          | benchLongest       | 300    | 0.362111 seconds | 828.47503693696 |
| symfony          | benchInvalidRoute  | 300    | 0.475322 seconds | 631.15108256486 |
| symfony          | benchLast          | 300    | 0.493186 seconds | 608.28977671553 |
| symfony          | benchInvalidMethod | 300    | 0.496024 seconds | 604.80957473654 |
| hack-routing     | benchInvalidMethod | 300    | 1.369977 seconds | 218.98177894572 |
| hack-routing     | benchLongest       | 300    | 1.393689 seconds | 215.25607063829 |
| hack-routing     | benchAll           | 364    | 1.877864 seconds | 193.83724075659 |
| hack-routing     | benchInvalidRoute  | 300    | 1.565661 seconds | 191.61236621837 |
| hack-routing     | benchLast          | 300    | 1.569695 seconds | 191.11993144362 |
+------------------+--------------------+--------+------------------+-----------------+
```
