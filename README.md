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

**Flight Routing** is an easy to use fast PHP router which competes with **FastRoute** and **Symfony**, offering some functionalities such as PSR-7, PSR-15 and PSR-17. Taking the extra features away will make **Flight Routing** the fastest PHP router.

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
| fast-route(mark):cached(file) | benchAll           | 364    | 0.004701 seconds | 77428.068566792 |
| fast-route(mark):cached(file) | benchInvalidRoute  | 300    | 0.004647 seconds | 64557.549638294 |
| symfony:cached(file)          | benchAll           | 364    | 0.005863 seconds | 62082.24853611  |
| fast-route(mark):cached(file) | benchInvalidMethod | 300    | 0.005252 seconds | 57122.35336844  |
| symfony:cached(file)          | benchInvalidRoute  | 300    | 0.005503 seconds | 54513.958929035 |
| symfony:cached(file)          | benchLast          | 300    | 0.006210 seconds | 48308.488501555 |
| fast-route(mark):cached(file) | benchLast          | 300    | 0.006491 seconds | 46218.225895317 |
| symfony:cached(file)          | benchInvalidMethod | 300    | 0.008187 seconds | 36643.210343924 |
| fast-route(mark):cached(apcu) | benchAll           | 364    | 0.033939 seconds | 10725.160913242 |
| fast-route(mark):cached(apcu) | benchInvalidMethod | 300    | 0.030251 seconds | 9917.0189625007 |
| fast-route(mark):cached(apcu) | benchLast          | 300    | 0.031376 seconds | 9561.4832826747 |
| fast-route(mark):cached(apcu) | benchInvalidRoute  | 300    | 0.033162 seconds | 9046.5321264497 |
| fast-route(mark):cached(file) | benchLongest       | 300    | 0.044005 seconds | 6817.3830124993 |
| symfony:cached(file)          | benchLongest       | 300    | 0.052136 seconds | 5754.1875120042 |
| hack-routing:cached(apcu)     | benchInvalidRoute  | 300    | 0.062724 seconds | 4782.8677641657 |
| hack-routing:cached(apcu)     | benchLast          | 300    | 0.066609 seconds | 4503.8861188565 |
| flight-routing:cached(file)   | benchInvalidMethod | 300    | 0.067035 seconds | 4475.2767947646 |
| hack-routing:cached(file)     | benchInvalidRoute  | 300    | 0.067312 seconds | 4456.8574737804 |
| hack-routing:cached(file)     | benchAll           | 364    | 0.083356 seconds | 4366.8172758996 |
| flight-routing:cached(file)   | benchInvalidRoute  | 300    | 0.069311 seconds | 4328.3084289606 |
| hack-routing:cached(apcu)     | benchInvalidMethod | 300    | 0.069377 seconds | 4324.20305992   |
| flight-routing:cached(file)   | benchLast          | 300    | 0.069882 seconds | 4292.9561319113 |
| flight-routing:cached(file)   | benchAll           | 364    | 0.085486 seconds | 4258.0103861622 |
| fast-route(mark):cached(apcu) | benchLongest       | 300    | 0.072339 seconds | 4147.1372259502 |
| hack-routing:cached(file)     | benchInvalidMethod | 300    | 0.072566 seconds | 4134.165670053  |
| hack-routing:cached(file)     | benchLast          | 300    | 0.073041 seconds | 4107.2843358707 |
| hack-routing:cached(apcu)     | benchAll           | 364    | 0.089345 seconds | 4074.0957890804 |
| hack-routing:cached(file)     | benchLongest       | 300    | 0.110309 seconds | 2719.6358519806 |
| flight-routing:cached(file)   | benchLongest       | 300    | 0.112439 seconds | 2668.1096852445 |
| hack-routing:cached(apcu)     | benchLongest       | 300    | 0.119578 seconds | 2508.8251127514 |
+-------------------------------+--------------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+--------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                      | Scenario           | Routes | Time             | Per Second      |
+---------------------------+--------------------+--------+------------------+-----------------+
| flight-routing:instance   | benchAll           | 364    | 0.000575 seconds | 633233.78515139 |
| fast-route(mark):instance | benchAll           | 364    | 0.000680 seconds | 535317.90182328 |
| fast-route(mark):instance | benchLast          | 300    | 0.000860 seconds | 348847.01968395 |
| hack-routing:instance     | benchLast          | 300    | 0.000936 seconds | 320502.08863984 |
| flight-routing:instance   | benchLast          | 300    | 0.000992 seconds | 302401.15356885 |
| hack-routing:instance     | benchInvalidRoute  | 300    | 0.000997 seconds | 300954.60416168 |
| fast-route(mark):instance | benchInvalidMethod | 300    | 0.001035 seconds | 289862.05943331 |
| fast-route(mark):instance | benchInvalidRoute  | 300    | 0.001238 seconds | 242351.92604006 |
| hack-routing:instance     | benchAll           | 364    | 0.001588 seconds | 229203.8216484  |
| hack-routing:instance     | benchInvalidMethod | 300    | 0.002304 seconds | 130217.44799752 |
| flight-routing:instance   | benchInvalidRoute  | 300    | 0.005013 seconds | 59844.535337201 |
| symfony:instance          | benchInvalidRoute  | 300    | 0.009220 seconds | 32537.525858502 |
| symfony:instance          | benchAll           | 364    | 0.013011 seconds | 27976.373524886 |
| symfony:instance          | benchLast          | 300    | 0.012110 seconds | 24772.925403106 |
| symfony:instance          | benchInvalidMethod | 300    | 0.013257 seconds | 22629.508668442 |
| flight-routing:instance   | benchInvalidMethod | 300    | 0.022599 seconds | 13274.934326437 |
| flight-routing:instance   | benchLongest       | 300    | 0.039608 seconds | 7574.2271019937 |
| fast-route(mark):instance | benchLongest       | 300    | 0.041581 seconds | 7214.848368434  |
| hack-routing:instance     | benchLongest       | 300    | 0.045894 seconds | 6536.8153647146 |
| symfony:instance          | benchLongest       | 300    | 0.059929 seconds | 5005.9325270528 |
+---------------------------+--------------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment but doesn't mean it can't be served for production.

```sh
+------------------+------ Benchmark results for group raw. --------+-----------------+
| Case             | Scenario           | Routes | Time             | Per Second      |
+------------------+--------------------+--------+------------------+-----------------+
| flight-routing   | benchInvalidRoute  | 300    | 0.176998 seconds | 1694.9353635522 |
| flight-routing   | benchLast          | 300    | 0.184605 seconds | 1625.0903408284 |
| flight-routing   | benchInvalidMethod | 300    | 0.196045 seconds | 1530.2615193026 |
| flight-routing   | benchAll           | 364    | 0.274102 seconds | 1327.9729312923 |
| fast-route(mark) | benchInvalidMethod | 300    | 0.235736 seconds | 1272.6093275442 |
| fast-route(mark) | benchLast          | 300    | 0.242793 seconds | 1235.6200434429 |
| fast-route(mark) | benchInvalidRoute  | 300    | 0.244260 seconds | 1228.2002928258 |
| fast-route(mark) | benchAll           | 364    | 0.298489 seconds | 1219.4750414152 |
| fast-route(mark) | benchLongest       | 300    | 0.275306 seconds | 1089.6966096455 |
| flight-routing   | benchLongest       | 300    | 0.326597 seconds | 918.56331400514 |
| symfony          | benchAll           | 364    | 0.404814 seconds | 899.17837721957 |
| symfony          | benchLongest       | 300    | 0.365158 seconds | 821.56199072332 |
| symfony          | benchInvalidMethod | 300    | 0.482185 seconds | 622.16767840288 |
| symfony          | benchInvalidRoute  | 300    | 0.499696 seconds | 600.36500233553 |
| symfony          | benchLast          | 300    | 0.503743 seconds | 595.54185316427 |
| hack-routing     | benchAll           | 364    | 1.818926 seconds | 200.1180811073  |
| hack-routing     | benchLast          | 300    | 1.515412 seconds | 197.96595364546 |
| hack-routing     | benchInvalidMethod | 300    | 1.518514 seconds | 197.56157415425 |
| hack-routing     | benchInvalidRoute  | 300    | 1.521535 seconds | 197.16928550197 |
| hack-routing     | benchLongest       | 300    | 1.580906 seconds | 189.76461362129 |
+------------------+--------------------+--------+------------------+-----------------+
```
