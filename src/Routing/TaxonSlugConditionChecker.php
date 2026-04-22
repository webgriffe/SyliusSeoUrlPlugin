<?php

declare(strict_types=1);

namespace StefanDoorn\SyliusSeoUrlPlugin\Routing;

use Sylius\Component\Locale\Context\LocaleContextInterface;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;

final class TaxonSlugConditionChecker
{
    public function __construct(
        private readonly TaxonRepositoryInterface $taxonRepository,
        private readonly LocaleContextInterface $localeContext,
    ) {
    }

    public function isTaxonSlug(string $slug): bool
    {
        return null !== $this->taxonRepository->findOneBySlug($slug, $this->localeContext->getLocaleCode());
    }
}
