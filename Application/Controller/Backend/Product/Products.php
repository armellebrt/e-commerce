<?php

namespace Application\Controller\Backend\Product;

use Application\Block\Backend\Product\ProductListBlock;
use Application\Controller\Backend\AbstractBackendController;

class Products extends AbstractBackendController
{
    public function execute()
    {
        $this->renderContent(new ProductListBlock(VIEW . 'backend/products/list.php'));
    }
}
