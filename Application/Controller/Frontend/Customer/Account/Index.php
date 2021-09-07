<?php

namespace Application\Controller\Frontend\Customer\Account;

use \Application\Controller\Frontend\AbstractFrontendController;
use \Application\Block\TemplateBlock;

class Index extends AbstractFrontendController
{
    public function execute()
    {
        $block = new TemplateBlock(VIEW . 'frontend/customer/account/index.php');
        $block->render();
    }
}
