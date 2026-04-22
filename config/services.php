<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use StefanDoorn\SyliusSeoUrlPlugin\Routing\ProductSlugConditionChecker;
use StefanDoorn\SyliusSeoUrlPlugin\Routing\RequestContext;
use StefanDoorn\SyliusSeoUrlPlugin\Routing\TaxonSlugConditionChecker;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set('stefandoorn.seo_url_plugin.routing.checker.product_slug_condition_checker', ProductSlugConditionChecker::class)
        ->args([
            service('sylius.repository.product'),
            service('sylius.context.channel'),
            service('sylius.context.locale'),
        ])
    ;

    $services->set('stefandoorn.seo_url_plugin.routing.checker.taxon_slug_condition_checker', TaxonSlugConditionChecker::class)
        ->args([
            service('sylius.repository.taxon'),
            service('sylius.context.locale'),
        ])
    ;

    $services->set('router.request_context', RequestContext::class)
        ->args([
            service('stefandoorn.seo_url_plugin.routing.checker.product_slug_condition_checker'),
            service('stefandoorn.seo_url_plugin.routing.checker.taxon_slug_condition_checker'),
            service('sylius.context.locale'),
            param('router.request_context.base_url'),
            'GET',
            param('router.request_context.host'),
            param('router.request_context.scheme'),
            param('request_listener.http_port'),
            param('request_listener.https_port'),
        ])
    ;
};
