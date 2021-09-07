<?php

namespace Application\Controller\Frontend\Customer\Account;

use Application\Block\Frontend\Customer\EditBlock;
use Application\Controller\Frontend\AbstractFrontendController;

class Edit extends AbstractFrontendController
{
    public function execute()
    {
        $block = new EditBlock(VIEW . 'frontend/customer/account/edit.php');
        $block->render();
    }
}
