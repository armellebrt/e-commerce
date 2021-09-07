<?php

namespace Application\Block\Frontend\Customer;

use \Application\Block\TemplateBlock;
use Application\Model\Customer\Session as CustomerSession;

class EditBlock extends TemplateBlock
{
    public function getCustomer()
    {
        $customerSession = new CustomerSession();
        return $customerSession->getCustomer();
    }
}
