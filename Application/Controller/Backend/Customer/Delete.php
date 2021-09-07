<?php

namespace Application\Controller\Backend\Customer;

use Application\Controller\AbstractController;
use Application\Model\Customer\ResourceModel\Customer as ResourceCustomer;

class Delete extends AbstractController
{
    public function execute()
    {
        $resourceCustomer = new ResourceCustomer();
        $resourceCustomer->delete($_GET['id']);
        header('location: ?action=admin/customer');
    }
}
