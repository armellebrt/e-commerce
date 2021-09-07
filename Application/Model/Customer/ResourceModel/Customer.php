<?php

namespace Application\Model\Customer\ResourceModel;

use Application\Model\Customer\Customer as CustomerModel;
use Application\Model\Framework\AbstractResourceModel;
use Exception;

class Customer extends AbstractResourceModel
{
    const TABLE_NAME = 'customer';
    const CREATE_FIELDS = [
        'email',
        'password',
        'firstname',
        'lastname'
    ];
    const UPDATE_FIELDS = [
        'id',
        'email',
        'password',
        'firstname',
        'lastname'
    ];

    public function getCustomerList()
    {
        $customers = [];
        $customersData = $this->getAll(self::TABLE_NAME);
        foreach ($customersData as $customerData) {
            $customers[] = new CustomerModel($customerData);
        }
        return $customers;
    }

    public function delete($id)
    {
        $this->deleteById($id);
    }

    public function createCustomer($customer)
    {
        $this->create($customer);
    }

    public function updateCustomer($customer)
    {
        $this->update($customer);
    }

    public function getByEmail(string $email): CustomerModel
    {
        $customerData = $this->getByColumnsValues(
            ['email' => $email]
        );

        if (empty($customerData)) {
            throw new Exception(sprintf('The customer with email %s does not exists', $email));
        }

        return new CustomerModel($customerData[0]);
    }

    public function getCustomerById($id)
    {
        $customerData = $this->getById($id);
        return new CustomerModel($customerData);
    }

    public function isEmailExists($email)
    {
        return $this->isExists('email', $email);
    }
}
