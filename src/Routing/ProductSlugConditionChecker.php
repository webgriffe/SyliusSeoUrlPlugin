<?php

declare(strict_types=1);

namespace StefanDoorn\SyliusSeoUrlPlugin\Routing;

use StefanDoorn\SyliusSeoUrlPlugin\Repository\ProductExistsByChannelAndSlugAwareInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Locale\Context\LocaleContextInterface;

final class ProductSlugConditionChecker
{
    public function __construct(
        private readonly ProductExistsByChannelAndSlugAwareInterface $productRepository,
        private readonly ChannelContextInterface $channelContext,
        private readonly LocaleContextInterface $localeContext,
    ) {
    }

    public function isProductSlug(string $slug): bool
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();

        return $this->productRepository->existsOneByChannelAndSlug(
            $channel,
            $this->localeContext->getLocaleCode(),
            $slug,
        );
    }
}
