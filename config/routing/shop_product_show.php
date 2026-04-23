<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->add('sylius_shop_product_show', '/{slug}')
        ->controller('sylius.controller.product::showAction')
        ->methods(['GET'])
        ->defaults([
            '_sylius' => [
                'template' => '@SyliusShop/product/show.html.twig',
                'repository' => [
                    'method' => 'findOneByChannelAndSlug',
                    'arguments' => [
                        "expr:service('sylius.context.channel').getChannel()",
                        "expr:service('sylius.context.locale').getLocaleCode()",
                        '$slug',
                    ],
                ],
            ],
        ])
        ->requirements(['slug' => '.+'])
        ->condition("context.checkProductSlug(request.getPathInfo())")
    ;
};
