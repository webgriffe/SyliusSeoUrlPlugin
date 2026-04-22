<?php

declare(strict_types=1);

namespace StefanDoorn\SyliusSeoUrlPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @psalm-api
 */
final class SyliusSeoUrlPlugin extends Bundle
{
    use SyliusPluginTrait;

    #[\Override]
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
