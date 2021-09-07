<?php

namespace Application\Block\Backend\Product;

use \Application\Block\TemplateBlock;
use Application\Model\Product\ResourceModel\Product as ResourceProduct;

class ProductListBlock extends TemplateBlock
{
    public function renderList()
    {
        $resourceProduct = new ResourceProduct();
        return $resourceProduct->getProductList();
    }
}
