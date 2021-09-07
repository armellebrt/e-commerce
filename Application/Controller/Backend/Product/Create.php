<?php

namespace Application\Controller\Backend\Product;

use \Application\Controller\Backend\AbstractBackendController;
use \Application\Block\TemplateBlock;

class Create extends AbstractBackendController
{
    public function execute()
    {
        $this->renderContent(new TemplateBlock(VIEW . 'backend/products/create.php'));
    }
}
