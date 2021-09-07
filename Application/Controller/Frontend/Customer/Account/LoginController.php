<?php

namespace Application\Controller\Frontend\Customer\Account;

use Application\Block\TemplateBlock;
use Application\Controller\Frontend\AbstractFrontendController;

class LoginController extends AbstractFrontendController
{
    public function execute()
    {
        $block = new TemplateBlock(VIEW . 'frontend/customer/account/login.php');
        $block->render();
    }
}
