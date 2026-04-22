<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->import(__DIR__ . '/routing/shop_product_index.php');
    $routes->import(__DIR__ . '/routing/shop_product_show.php');
};
