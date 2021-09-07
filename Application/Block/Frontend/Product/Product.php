<?php

namespace Application\Block\Frontend\Product;

use Application\Model\Product\ResourceModel\Product as ProductManager;

class Product extends AbstractProduct
{
    public function getProduct()
    {
        $manager = new ProductManager();
        return $manager->getProductById($_GET['id']);
    }
}
