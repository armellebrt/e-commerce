<?php

namespace Application\Block\Frontend\Product;

use Application\Model\Product\Product;
use Application\Block\TemplateBlock;

class AbstractProduct extends TemplateBlock
{
    public function getProductImage(Product $product)
    {
        if (empty($product->getImage())) {
            return "./images/No_image_Found.png";
        } else {
            return $product->getImage();
        }
    }
}
