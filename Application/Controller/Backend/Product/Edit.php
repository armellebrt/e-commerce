<?php

namespace Application\Controller\Backend\Product;

use Application\Block\Backend\Product\EditBlock;
use Application\Controller\Backend\AbstractBackendController;

class Edit extends AbstractBackendController
{
    public function execute()
    {
        $this->renderContent(new EditBlock(VIEW . 'backend/products/edit.php'));
    }
}
