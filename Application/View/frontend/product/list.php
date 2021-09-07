<?php $collection = $this->renderList(); ?>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <?php foreach ($collection as $product) : ?>
                <a href="?action=product&id=<?= $product->getId() ?>">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class='productsImage' src="<?= $this->getProductImage($product) ?>" />
                            <div class="card-body">
                                <p class="card-text"><?= $product->getName() ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted"><?= $product->getPrice() ?> €</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>


        </div>
    </div>
</div>