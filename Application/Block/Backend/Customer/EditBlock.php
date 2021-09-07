<?php

namespace Application\Block\Backend\Customer;

use \Application\Block\TemplateBlock;
use Application\Model\Customer\ResourceModel\Customer as CustomerResource;

class EditBlock extends TemplateBlock
{
    public function getCustomer()
    {
        $CustomerResource = new CustomerResource();
        return $CustomerResource->getCustomerById($_GET['id']);
    }
}
