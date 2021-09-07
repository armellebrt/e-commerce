<?php

namespace Application\Controller\Backend\Customer;

use Application\Controller\AbstractController;
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
            $id = $_GET['id'];

            $resourceModel = new CustomerResource();
            $customer = $resourceModel->getCustomerById($id);

            $firstname = $customer->getData('firstname');
            $lastname = $customer->getData('lastname');

            if (!empty($post['firstname']) && $post['firstname'] != $firstname) {
                $firstname = $post['firstname'];
            }

            if (!empty($post['lastname']) && $post['lastname'] != $lastname) {
                $lastname = $post['lastname'];
            }

            $newCustomer = new Customer([
                'id' => $id,
                'email' => $customer->getEmail(),
                'firstname' => $firstname,
                'lastname' => $lastname
            ]);

            $resourceModel->update($newCustomer);

            header('location: ?action=admin/customer&id=' . $id);
        } catch (Exception $e) {

            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());

            header('location: ?action=admin/customer&id=' . $id);
        }
    }
}
