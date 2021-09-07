<?php $customer = $this->getCustomer(); ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <a href="?action=admin/customer"><i class="bi bi-arrow-left"></i> Back </a>
    <div class="container">
        <h2 class='m-4'>Customer</h2>
        <form action="?action=admin/customer/editPost&id=<?= $customer->getData('id') ?>" method="post" class='m-3'>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" readonly class="form-control-plaintext" name="email" value="<?= $customer->getData('email'); ?>">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" name="firstname" value="<?= $customer->getData('firstname'); ?>">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" name="lastname" value="<?= $customer->getData('lastname'); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</main>