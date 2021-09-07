<?php $product = $this->getProduct(); ?>
<div class="m-5">
    <a href="index.php"><button class='btn btn-warning'>Retour</button></a>
</div>
<div class="d-flex justify-content-center container mt-5">
    <div id='single-product-card' class="card p-3 bg-white"><i class="fa fa-apple"></i>
        <div class="about-product text-center mt-2"><a href="<?= $this->getProductImage($product) ?>"><img src="<?= $this->getProductImage($product) ?>" width="300"></a>
            <div>
                <h4><?= ucfirst($product->getName()) ?></h4>
                <h6 class="mt-0 text-black-50"><?= $product->getSku() ?></h6>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Total</span><span> <?= $product->getPrice() ?> €</span></div>
            <button class="btn btn-success">Ajouter au panier</button>
        </div>
    </div>
</div>