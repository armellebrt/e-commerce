<?php

namespace Application\Block\Frontend\Product;

use Application\Model\Product\ResourceModel\Product as ResourceModel;

class ProductList extends AbstractProduct
{
    public function renderList()
    {
        $resourceModel = new ResourceModel();
        return $resourceModel->getProductList();
    }
}
