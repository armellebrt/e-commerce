<?php

namespace Application\Controller\Frontend\Product;

use Application\Block\Frontend\Product\Product as ProductBlock;
use Application\Controller\Frontend\AbstractFrontendController;

class ProductController extends AbstractFrontendController
{
    public function execute()
    {
        $block = new ProductBlock(VIEW . 'frontend/product/product.php');
        return $block->render();
    }
}
