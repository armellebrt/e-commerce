<?php $product = $this->getProduct(); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <a href="?action=admin/products"><i class="bi bi-arrow-left"></i> Back </a>
    <div class="container">
        <h2 class='m-4'>Product</h2>
        <form action="?action=admin/products/editPost&id=<?= $product->getData('id') ?>" method="post" enctype="multipart/form-data" class='m-3'>
            <div class="mb-3">
                <label for="sku" class="form-label">Sku</label>
                <input type="text" class="form-control" name="sku" value="<?= $product->getData('sku'); ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= $product->getData('name'); ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="<?= $product->getData('price'); ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" value="<?= $product->getData('description'); ?>">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label"><img src='<?= $product->getData('image'); ?>'></label>
                <input class='hidden' class="form-control" type="file" name="image" accept="image/png, image/jpeg">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="?action=admin/products"><button class="btn btn-danger">Cancel</button></a>
        </form>
    </div>
</main>