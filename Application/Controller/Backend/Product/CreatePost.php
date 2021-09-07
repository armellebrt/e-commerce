<?php

namespace Application\Controller\Backend\Product;

use Application\Helper\ImageManager;
use Application\Controller\AbstractController;
use Application\Model\Product\Product;
use Application\Model\Framework\MessageSession;
use Application\Model\Product\ResourceModel\Product as ProductResource;
use \Exception;

class CreatePost extends AbstractController
{
    public function execute()
    {
        try {
            $post = array_map('htmlspecialchars', $_POST);

            $resourceModel = new ProductResource();

            if ($resourceModel->isSkuExists($post['sku'])) {
                throw new Exception('Sku already exists.');
            }

            $uploader = new ImageManager();
            $image = $uploader->uploadImage();

            $post['image'] = $image;

            $product = new Product($post);
            $resourceModel->createProduct($product);

            header('Location: ?action=admin/products');
        } catch (\Exception $e) {
            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());
            header('Location: ?action=admin/products/create');
        }
    }
}
