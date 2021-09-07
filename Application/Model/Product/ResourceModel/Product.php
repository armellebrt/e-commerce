<?php

namespace Application\Model\Product\ResourceModel;

use Application\Model\Framework\AbstractResourceModel;
use  Application\Model\Product\Product as ProductModel;
use Exception;

class Product extends AbstractResourceModel
{
    const TABLE_NAME = 'product';
    const CREATE_FIELDS = [
        'sku',
        'name',
        'price',
        'description',
        'image'
    ];
    const UPDATE_FIELDS = [
        'id',
        'sku',
        'name',
        'price',
        'description',
        'image'
    ];

    public function getProductList()
    {
        $products = [];
        $productsData = $this->getAll();
        foreach ($productsData as $productData) {
            $products[] = new ProductModel($productData);
        }
        return $products;
    }

    public function getBySku($sku): ProductModel
    {
        $productData = $this->getByColumnsValues(
            ['sku' => $sku]
        );

        if (empty($productData)) {
            throw new Exception(sprintf('The product with sku %s does not exists', $sku));
        }

        return new ProductModel($productData[0]);
    }

    public function getProductById($id)
    {
        $productData = $this->getById($id);
        return new ProductModel($productData);
    }

    public function isSkuExists($sku)
    {
        return $this->isExists('sku', $sku);
    }

    public function delete($id)
    {
        $this->deleteById($id);
    }

    public function createProduct($product)
    {
        $this->create($product);
    }

    public function updateProduct($product)
    {
        $this->update($product);
    }
}
