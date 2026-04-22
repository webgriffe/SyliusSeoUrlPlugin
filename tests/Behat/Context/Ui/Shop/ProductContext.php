<?php

declare(strict_types=1);

namespace Tests\StefanDoorn\SyliusSeoUrlPlugin\Behat\Context\Ui\Shop;

use Behat\Behat\Context\Context;
use Tests\StefanDoorn\SyliusSeoUrlPlugin\Behat\Page\Shop\Product\IndexPageInterface;
use Tests\StefanDoorn\SyliusSeoUrlPlugin\Behat\Page\Shop\Product\ShowPageInterface;
use Webmozart\Assert\Assert;

final class ProductContext implements Context
{
    public function __construct(
        private readonly IndexPageInterface $indexPage,
        private readonly ShowPageInterface $showPage,
    ) {
    }

    /**
     * @Then /^the taxon page response status code should be (?P<code>\d+)$/
     */
    public function iShouldGetStatusCodeOnTaxonPage(int $code): void
    {
        Assert::same($code, $this->indexPage->getStatusCode());
    }

    /**
     * @Then /^the product page response status code should be (?P<code>\d+)$/
     */
    public function iShouldGetStatusCodeOnProductPage(int $code): void
    {
        Assert::same($code, $this->showPage->getStatusCode());
    }
}
