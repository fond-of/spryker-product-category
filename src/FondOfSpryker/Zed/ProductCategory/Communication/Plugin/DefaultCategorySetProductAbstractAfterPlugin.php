<?php

namespace FondOfSpryker\Zed\ProductCategory\Communication\Plugin;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginCreateInterface;
use Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginUpdateInterface;

/**
 * @method \FondOfSpryker\Zed\ProductCategory\ProductCategoryConfig getConfig()
 * @method \Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface getFacade()
 */
class DefaultCategorySetProductAbstractAfterPlugin extends AbstractPlugin implements ProductAbstractPluginCreateInterface, ProductAbstractPluginUpdateInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function create(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $this->assignToDefaultCategory($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function update(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $this->assignToDefaultCategory($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected function assignToDefaultCategory(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        $defaultCategoryId = $this->getConfig()->getDefaultCategoryId();
        $productIdsToAssign = [$productAbstractTransfer->getIdProductAbstract()];

        $this->getFacade()->createProductCategoryMappings($defaultCategoryId, $productIdsToAssign);

        return $productAbstractTransfer;
    }
}
