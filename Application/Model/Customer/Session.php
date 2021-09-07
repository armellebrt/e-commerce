<?php

namespace Application\Model\Customer;

use Application\Model\Customer\Customer as CustomerModel;

/**
 * Class Session
 * @package Application\Model\Customer
 */
class Session extends \Application\Model\Framework\Session
{
    const SESSION_KEY = 'customer';

    /**
     * Store the customer in session
     *
     * @param CustomerModel $customer
     */
    public function setCustomer(CustomerModel $customer)
    {
        $customerData = $customer->getData();
        unset($customerData['password']);

        $this->set(self::SESSION_KEY, $customerData);
    }

    public function getCustomer()
    {
        return new CustomerModel($this->get(self::SESSION_KEY));
    }

    public function removeCustomer()
    {
        $this->remove(self::SESSION_KEY);
    }

    public function isLoggedIn()
    {
        return $this->get(self::SESSION_KEY) !== null;
    }
}
