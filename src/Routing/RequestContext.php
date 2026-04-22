<?php

declare(strict_types=1);

namespace StefanDoorn\SyliusSeoUrlPlugin\Routing;

use Sylius\Component\Locale\Context\LocaleContextInterface;
use Symfony\Component\Routing\RequestContext as BaseRequestContext;

final class RequestContext extends BaseRequestContext
{
    public function __construct(
        private readonly ProductSlugConditionChecker $productSlugConditionChecker,
        private readonly TaxonSlugConditionChecker $taxonSlugConditionChecker,
        private readonly LocaleContextInterface $localeContext,
        string $baseUrl = '',
        string $method = 'GET',
        string $host = 'localhost',
        string $scheme = 'http',
        int $httpPort = 80,
        int $httpsPort = 443,
        string $path = '/',
        string $queryString = '',
    ) {
        parent::__construct($baseUrl, $method, $host, $scheme, $httpPort, $httpsPort, $path, $queryString);
    }

    public function checkProductSlug(string $slug): bool
    {
        return $this->productSlugConditionChecker->isProductSlug($this->prepareSlug($slug));
    }

    public function checkTaxonSlug(string $slug): bool
    {
        return $this->taxonSlugConditionChecker->isTaxonSlug($this->prepareSlug($slug));
    }

    private function prepareSlug(string $slug): string
    {
        $slug = urldecode(ltrim($slug, '/'));
        $localeCode = $this->localeContext->getLocaleCode();

        if (!str_contains($slug, $localeCode)) {
            return $slug;
        }

        return str_replace(sprintf('%s/', $localeCode), '', $slug);
    }
}
