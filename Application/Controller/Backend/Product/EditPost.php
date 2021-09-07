<?php

namespace Application\Controller\Backend\Product;

use Application\Helper\ImageManager;
use Application\Controller\AbstractController;
use Application\Model\Product\ResourceModel\Product as ProductResource;
use Application\Model\Product\Product;
use Application\Model\Framework\MessageSession;
use Exception;

class EditPost extends AbstractController
{
    public function execute()
    {
        try {
            $post = array_map('htmlspecialchars', $_POST);
            $id = $_GET['id'];

            $resourceModel = new ProductResource();
            $product = $resourceModel->getProductById($id);

            $sku = $product->getData('sku');
            if ($sku != $post['sku']) {
                if ($resourceModel->isSkuExists($post['sku'])) {
                    throw new Exception('Sku already exists.');
                }

                if (!empty($post['sku'])) {
                    $sku = $post['sku'];
                }
            }

            $name = $product->getData('name');
            $price = $product->getData('price');
            $description = $product->getData('description');
            $image = $product->getData('image');

            if (!empty($post['name']) && $post['name'] != $name) {
                $name = $post['name'];
            }

            if (!empty($post['price']) && $post['price'] != $price) {
                $price = $post['price'];
            }

            if (!empty($post['description']) && $post['description'] != $description) {
                $description = $post['description'];
            }

            $imageManager = new ImageManager();
            if ($imageManager->uploadImage()) {
                $image = $imageManager->uploadImage();
                $imageManager->deleteImage($product);
            }

            $newProduct = new Product([
                'id' => $id,
                'sku' => $sku,
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'image' => $image
            ]);

            $resourceModel->update($newProduct);

            header('location: ?action=admin/products/edit&id=' . $id);
        } catch (Exception $e) {
            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());
            header('location: ?action=admin/products/edit&id=' . $id);
        }
    }
}
