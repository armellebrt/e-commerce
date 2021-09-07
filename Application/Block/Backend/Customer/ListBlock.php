<?php

namespace Application\Block\Backend\Customer;

use \Application\Block\TemplateBlock;
use Application\Model\Customer\ResourceModel\Customer as RessourceCustomer;

class ListBlock extends TemplateBlock
{
    public function renderList()
    {
        $ressourceCustomer = new RessourceCustomer();
        return $ressourceCustomer->getCustomerList();
    }
}
