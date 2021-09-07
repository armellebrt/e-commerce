<?php

namespace Application\Controller\Backend;

use Application\Controller\Backend\AbstractBackendController;
use Application\Block\TemplateBlock;

class IndexController extends AbstractBackendController
{
    public function execute()
    {
        $this->renderContent(new TemplateBlock(VIEW . 'backend/index.php'));
    }
}
