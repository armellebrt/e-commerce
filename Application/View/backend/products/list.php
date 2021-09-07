<?php $products = $this->renderList(); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class='m-5'>
        <h1 class='mb-5 mt-3'>List of products</h1>
    </div>

    <div class="mx-auto col-11 table-responsive">

        <a href="?action=admin/products/create"><button class="btn btn-secondary ms-1 mb-3">Add a product</button></a>
        <table class="table table-sm align-middle table-hover table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Sku</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) :
                ?>
                    <tr>
                        <th class='col-md-1'><?= $product->getId() ?></th>
                        <td class='col-md-1'><?= $product->getSku() ?></td>
                        <td class='col-md-2'><?= $product->getName() ?></td>
                        <td class='col-md-1'><?= $product->getPrice() ?> €</td>
                        <td class='col-md-2'><?= $product->getDescription() ?></td>
                        <td class='col-md-1'><a class="btn btn-success" href="?action=admin/products/edit&id=<?= $product->getData('id') ?>">Edit</button></td>
                        <td class='col-md-1'><a class="btn btn-danger" href="?action=admin/products/delete&id=<?= $product->getId() ?>">Delete</button></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</main>