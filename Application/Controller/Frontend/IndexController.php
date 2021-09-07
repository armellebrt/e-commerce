<?php

namespace Application\Controller\Frontend;

use Application\Block\Frontend\Product\ProductList;
use Application\Controller\Frontend\AbstractFrontendController;

class IndexController extends AbstractFrontendController
{
    public function execute()
    {
        $block = new ProductList(VIEW . 'frontend/product/list.php');
        $block->render();
    }
}
