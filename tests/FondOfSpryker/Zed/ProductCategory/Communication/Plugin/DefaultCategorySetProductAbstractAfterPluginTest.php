<?php

namespace FondOfSpryker\Zed\ProductCategory\Communication\Plugin;

use Codeception\Test\Unit;
use org\bovigo\vfs\vfsStream;
use Spryker\Shared\Config\Config;
use Spryker\Zed\ProductCategory\Business\ProductCategoryFacade;

class DefaultCategorySetProductAbstractAfterPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductCategory\Communication\Plugin\DefaultCategorySetProductAbstractAfterPlugin
     */
    protected $defaultCategorySetProductAbstractAfterPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject;
     */
    protected $productAbstractTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject;
     */
    protected $productCategoryFacadeMock;

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

        $this->productAbstractTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductAbstractTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getIdProductAbstract'])
            ->getMock();

        $this->productCategoryFacadeMock = $this->getMockBuilder(ProductCategoryFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductAbstract')
            ->willReturn(1);

        $this->productCategoryFacadeMock->expects($this->atLeastOnce())
            ->method('createProductCategoryMappings')
            ->with(2, [1]);

        Config::init();

        $this->defaultCategorySetProductAbstractAfterPlugin = new DefaultCategorySetProductAbstractAfterPlugin();
        $this->defaultCategorySetProductAbstractAfterPlugin->setFacade($this->productCategoryFacadeMock);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $this->defaultCategorySetProductAbstractAfterPlugin->create($this->productAbstractTransferMock);
    }

    /**
     * @return void
     */
    public function testUpdate()
    {
        $this->defaultCategorySetProductAbstractAfterPlugin->update($this->productAbstractTransferMock);
    }
}
