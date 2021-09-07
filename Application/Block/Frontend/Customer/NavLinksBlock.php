<?php

namespace Application\Block\Frontend\Customer;

use \Application\Block\TemplateBlock;
use Application\Model\Customer\Session as CustomerSession;

class NavLinksBlock extends TemplateBlock
{
    public function getSession()
    {
        return new CustomerSession();
    }
}
