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
| fast-route(mark):cached(file) | benchAll           | 364    | 0.004870 seconds | 74744.279643592 |
| fast-route(mark):cached(file) | benchInvalidRoute  | 300    | 0.004547 seconds | 65975.838926175 |
| symfony:cached(file)          | benchAll           | 364    | 0.006301 seconds | 57767.098868667 |
| fast-route(mark):cached(file) | benchLast          | 300    | 0.005218 seconds | 57492.972676597 |
| symfony:cached(file)          | benchInvalidRoute  | 300    | 0.005533 seconds | 54220.330072822 |
| fast-route(mark):cached(file) | benchInvalidMethod | 300    | 0.005582 seconds | 53743.270832443 |
| symfony:cached(file)          | benchLast          | 300    | 0.006347 seconds | 47266.864505466 |
| symfony:cached(file)          | benchInvalidMethod | 300    | 0.007213 seconds | 41590.903682158 |
| fast-route(mark):cached(apcu) | benchAll           | 364    | 0.031749 seconds | 11464.924387038 |
| fast-route(mark):cached(apcu) | benchLast          | 300    | 0.027928 seconds | 10741.863939422 |
| fast-route(mark):cached(apcu) | benchInvalidMethod | 300    | 0.028093 seconds | 10678.869557838 |
| fast-route(mark):cached(apcu) | benchInvalidRoute  | 300    | 0.029318 seconds | 10232.588701217 |
| fast-route(mark):cached(file) | benchLongest       | 300    | 0.047270 seconds | 6346.5119915265 |
| symfony:cached(file)          | benchLongest       | 300    | 0.048893 seconds | 6135.8508231255 |
| hack-routing:cached(apcu)     | benchInvalidRoute  | 300    | 0.056482 seconds | 5311.4194417125 |
| hack-routing:cached(apcu)     | benchLast          | 300    | 0.057317 seconds | 5234.0475447682 |
| hack-routing:cached(file)     | benchInvalidRoute  | 300    | 0.058156 seconds | 5158.5379052491 |
| hack-routing:cached(apcu)     | benchAll           | 364    | 0.070643 seconds | 5152.6728361312 |
| hack-routing:cached(apcu)     | benchInvalidMethod | 300    | 0.058511 seconds | 5127.2393882964 |
| hack-routing:cached(file)     | benchLast          | 300    | 0.059492 seconds | 5042.6853900163 |
| hack-routing:cached(file)     | benchInvalidMethod | 300    | 0.060854 seconds | 4929.8161345552 |
| hack-routing:cached(file)     | benchAll           | 364    | 0.074904 seconds | 4859.5558328294 |
| fast-route(mark):cached(apcu) | benchLongest       | 300    | 0.069801 seconds | 4297.9417008806 |
| flight-routing:cached(file)   | benchAll           | 364    | 0.105624 seconds | 3446.1877616985 |
| flight-routing:cached(file)   | benchInvalidRoute  | 300    | 0.090498 seconds | 3314.99146416   |
| flight-routing:cached(file)   | benchLast          | 300    | 0.090810 seconds | 3303.5987240243 |
| flight-routing:cached(file)   | benchInvalidMethod | 300    | 0.092248 seconds | 3252.1043327234 |
| hack-routing:cached(apcu)     | benchLongest       | 300    | 0.102598 seconds | 2924.0349780515 |
| hack-routing:cached(file)     | benchLongest       | 300    | 0.105664 seconds | 2839.1879725715 |
| flight-routing:cached(file)   | benchLongest       | 300    | 0.134711 seconds | 2226.9891808947 |
+-------------------------------+--------------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+--------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                      | Scenario           | Routes | Time             | Per Second      |
+---------------------------+--------------------+--------+------------------+-----------------+
| symfony:instance          | benchAll           | 364    | 0.000557 seconds | 653564.49315068 |
| fast-route(mark):instance | benchAll           | 364    | 0.000775 seconds | 469762.048      |
| symfony:instance          | benchInvalidRoute  | 300    | 0.000813 seconds | 369000.35190616 |
| symfony:instance          | benchLast          | 300    | 0.000831 seconds | 361059.16786226 |
| fast-route(mark):instance | benchLast          | 300    | 0.000958 seconds | 313163.56396217 |
| hack-routing:instance     | benchInvalidRoute  | 300    | 0.000990 seconds | 303056.64739884 |
| fast-route(mark):instance | benchInvalidMethod | 300    | 0.001028 seconds | 291879.19276271 |
| hack-routing:instance     | benchAll           | 364    | 0.001322 seconds | 275333.93255184 |
| hack-routing:instance     | benchLast          | 300    | 0.001123 seconds | 267153.1210191  |
| fast-route(mark):instance | benchInvalidRoute  | 300    | 0.001258 seconds | 238493.40409402 |
| flight-routing:instance   | benchAll           | 364    | 0.001830 seconds | 198896.12506514 |
| flight-routing:instance   | benchInvalidRoute  | 300    | 0.001603 seconds | 187134.32480666 |
| symfony:instance          | benchInvalidMethod | 300    | 0.001610 seconds | 186330.69746779 |
| hack-routing:instance     | benchInvalidMethod | 300    | 0.002011 seconds | 149175.00889152 |
| flight-routing:instance   | benchLast          | 300    | 0.002218 seconds | 135256.4979039  |
| flight-routing:instance   | benchInvalidMethod | 300    | 0.003024 seconds | 99210.849168178 |
| symfony:instance          | benchLongest       | 300    | 0.042763 seconds | 7015.4113770553 |
| fast-route(mark):instance | benchLongest       | 300    | 0.043103 seconds | 6960.0756691577 |
| hack-routing:instance     | benchLongest       | 300    | 0.044060 seconds | 6808.8982202477 |
| flight-routing:instance   | benchLongest       | 300    | 0.044475 seconds | 6745.3506448949 |
+---------------------------+--------------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment but doesn't mean it can't be served for production.

```sh
+------------------+------ Benchmark results for group raw. --------+-----------------+
| Case             | Scenario           | Routes | Time             | Per Second      |
+------------------+--------------------+--------+------------------+-----------------+
| fast-route(mark) | benchAll           | 364    | 0.275124 seconds | 1323.0405883082 |
| fast-route(mark) | benchInvalidRoute  | 300    | 0.230777 seconds | 1299.956092728  |
| fast-route(mark) | benchLast          | 300    | 0.234042 seconds | 1281.8202933039 |
| fast-route(mark) | benchInvalidMethod | 300    | 0.244466 seconds | 1227.1641805601 |
| fast-route(mark) | benchLongest       | 300    | 0.272791 seconds | 1099.7433943267 |
| flight-routing   | benchAll           | 364    | 0.340165 seconds | 1070.0692522542 |
| flight-routing   | benchInvalidRoute  | 300    | 0.287484 seconds | 1043.5365878943 |
| flight-routing   | benchLast          | 300    | 0.290840 seconds | 1031.4944518769 |
| flight-routing   | benchLongest       | 300    | 0.333854 seconds | 898.59585827467 |
| flight-routing   | benchInvalidMethod | 300    | 0.344182 seconds | 871.63183255242 |
| hack-routing     | benchAll           | 364    | 1.860313 seconds | 195.66600458968 |
| hack-routing     | benchInvalidRoute  | 300    | 1.543103 seconds | 194.41346686149 |
| hack-routing     | benchInvalidMethod | 300    | 1.549271 seconds | 193.6394467687  |
| hack-routing     | benchLast          | 300    | 1.555949 seconds | 192.8083794927  |
| hack-routing     | benchLongest       | 300    | 1.617138 seconds | 185.51290778147 |
| symfony          | benchAll           | 364    | 2.075229 seconds | 175.4023148979  |
| symfony          | benchLast          | 300    | 1.711189 seconds | 175.31669176217 |
| symfony          | benchInvalidRoute  | 300    | 1.720301 seconds | 174.38807140107 |
| symfony          | benchInvalidMethod | 300    | 1.728899 seconds | 173.52083588452 |
| symfony          | benchLongest       | 300    | 1.832994 seconds | 163.66665825544 |
+------------------+--------------------+--------+------------------+-----------------+
```
