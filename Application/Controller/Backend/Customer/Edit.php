<?php

namespace Application\Controller\Backend\Customer;

use Application\Block\Backend\Customer\EditBlock;
use Application\Controller\Backend\AbstractBackendController;

class Edit extends AbstractBackendController
{
    public function execute()
    {
        $this->renderContent(new EditBlock(VIEW . 'backend/customers/edit.php'));
    }
}
