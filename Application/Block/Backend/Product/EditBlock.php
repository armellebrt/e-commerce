<?php

namespace Application\Block\Backend\Product;

use \Application\Block\TemplateBlock;
use Application\Model\Product\ResourceModel\Product as ProductResource;

class EditBlock extends TemplateBlock
{
    public function getProduct()
    {
        $ProductResource = new ProductResource();
        return $ProductResource->getProductById($_GET['id']);
    }
}
