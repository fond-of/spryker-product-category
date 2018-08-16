<?php

use FondOfSpryker\Shared\ProductCategory\ProductCategoryConstants;
use Spryker\Shared\Kernel\KernelConstants;

$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];

$config[KernelConstants::CORE_NAMESPACES] = [
    'FondOfSpryker',
    'SprykerShop',
    'SprykerEco',
    'Spryker',
];

$config[ProductCategoryConstants::DEFAULT_CATEGORY_ID] = 2;
