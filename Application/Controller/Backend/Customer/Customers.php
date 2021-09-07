<?php

namespace Application\Controller\Backend\Customer;

use Application\Controller\Backend\AbstractBackendController;
use Application\Block\Backend\Customer\ListBlock;

class Customers extends AbstractBackendController
{
    public function execute()
    {
        $this->renderContent(new ListBlock(VIEW . 'backend/customers/list.php'));
    }
}
