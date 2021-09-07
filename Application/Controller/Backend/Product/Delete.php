<?php

namespace Application\Controller\Backend\Product;

use Application\Controller\AbstractController;
use Application\Model\Framework\MessageSession;
use Application\Helper\ImageManager;
use Application\Model\Product\ResourceModel\Product as ResourceProduct;
use Exception;

class Delete extends AbstractController
{
    public function execute()
    {
        try {
            $resourceProduct = new ResourceProduct();
            $product = $resourceProduct->getProductById($_GET['id']);
            $imageManager = new ImageManager();
            $imageManager->deleteImage($product);
            $resourceProduct->delete($_GET['id']);

            header('location: ?action=admin/products');
        } catch (Exception $e) {
            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());
            header('location: ?action=admin/products');
        }
    }
}
