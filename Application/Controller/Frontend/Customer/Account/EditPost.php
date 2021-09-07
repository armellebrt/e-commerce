<?php

namespace Application\Controller\Frontend\Customer\Account;

use Application\Controller\AbstractController;
use Application\Helper\Customer as CustomerHelper;
use Application\Model\Customer\Session as CustomerSession;
use Application\Model\Customer\ResourceModel\Customer as CustomerResource;
use Application\Model\Customer\Customer;
use Application\Model\Framework\MessageSession;
use Exception;

class editPost extends AbstractController
{
    public function execute()
    {
        try {

            $post = array_map('htmlspecialchars', $_POST);
            $password = $post['password'];

            $customerSession = new CustomerSession();
            $customer = $customerSession->getCustomer();

            $resourceModel = new CustomerResource();
            $customerBdd = $resourceModel->getByEmail($customer->getEmail());

            $helper = new CustomerHelper();

            if (!$helper->passwordVerify($password, $customerBdd->getData('password'))) {
                throw new Exception('Invalid password');
            }

            $password = $customerBdd->getData('password');
            $firstname = $customer->getData('firstname');
            $lastname = $customer->getData('lastname');

            if (!empty($post['newPassword'])) {
                $password = $helper->passwordHash($_POST['newPassword']);
            }

            if (!empty($post['firstname'])) {
                $firstname = $post['firstname'];
            }

            if (!empty($post['lastname'])) {
                $lastname = $post['lastname'];
            }

            $newCustomer = new Customer([
                'id' => $customer->getId(),
                'email' => $customer->getEmail(),
                'firstname' => $firstname,
                'lastname' => $lastname,
                'password' => $password
            ]);

            $resourceModel->updateCustomer($newCustomer);

            $customerSession->setCustomer($newCustomer);

            header('location: ?action=customer/edit');
        } catch (Exception $e) {

            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());

            header('location: ?action=customer/edit');
        }
    }
}
