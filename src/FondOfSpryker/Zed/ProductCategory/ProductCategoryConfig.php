<?php

namespace FondOfSpryker\Zed\ProductCategory;

use FondOfSpryker\Shared\ProductCategory\ProductCategoryConstants;
use Spryker\Zed\ProductCategory\ProductCategoryConfig as BaseProductCategoryConfig;

class ProductCategoryConfig extends BaseProductCategoryConfig
{
    /**
     * @return int
     */
    public function getDefaultCategoryId(): int
    {
        return $this->get(ProductCategoryConstants::DEFAULT_CATEGORY_ID, null);
    }
}
