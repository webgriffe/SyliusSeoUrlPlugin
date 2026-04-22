<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Tests\StefanDoorn\SyliusSeoUrlPlugin\Behat\Context\Ui\Shop\ProductContext;
use Tests\StefanDoorn\SyliusSeoUrlPlugin\Behat\Page\Shop\Product\IndexPage;
use Tests\StefanDoorn\SyliusSeoUrlPlugin\Behat\Page\Shop\Product\ShowPage;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set('sylius.behat.page.shop.product.show.class', ShowPage::class);
    $parameters->set('sylius.behat.page.shop.product.index.class', IndexPage::class);

    $services = $containerConfigurator->services();

    $services->set('stefandoorn.seo_url_plugin.behat.context.shop.product', ProductContext::class)
        ->args([
            service('sylius.behat.page.shop.product.index'),
            service('sylius.behat.page.shop.product.show'),
        ])
        ->public()
    ;
};
