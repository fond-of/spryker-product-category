<?php

namespace FondOfSpryker\Zed\ProductCategory;

use Codeception\Test\Unit;
use org\bovigo\vfs\vfsStream;

class ProductCategoryConfigTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductCategory\ProductCategoryConfig
     */
    protected $productCategoryConfig;

    /**
     * @return void
     */
    protected function _before()
    {
        $this->vfsStreamDirectory = vfsStream::setup('root', null, [
            'config' => [
                'Shared' => [
                    'stores.php' => file_get_contents(codecept_data_dir('stores.php')),
                    'config_default.php' => file_get_contents(codecept_data_dir('config_default.php')),
                ],
            ],
        ]);

        $this->productCategoryConfig = new ProductCategoryConfig();
    }

    /**
     * @return void
     */
    public function testGetDefaultCategoryId()
    {
        self::assertEquals(2, $this->productCategoryConfig->getDefaultCategoryId());
    }
}
