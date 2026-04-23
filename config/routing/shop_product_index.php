<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->add('sylius_shop_product_index', '/{slug}')
        ->controller('sylius.controller.product::indexAction')
        ->methods(['GET'])
        ->defaults([
            '_sylius' => [
                'template' => '@SyliusShop/product/index.html.twig',
                'grid' => 'sylius_shop_product',
            ],
        ])
        ->requirements(['slug' => '.+'])
        ->condition("context.checkTaxonSlug(request.getPathInfo())")
    ;
};
