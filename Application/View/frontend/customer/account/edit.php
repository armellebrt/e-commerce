<?php $customer = $this->getCustomer(); ?>
<div class="container">
    <form action="?action=customer/editPost" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control-plaintext" name="email" value="<?= $customer->getData('email'); ?>">
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" name="firstname" value="<?= $customer->getData('firstname'); ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Lastname</label>
            <input type="text" class="form-control" name="lastname" value="<?= $customer->getData('lastname'); ?>">
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">New pasword</label>
            <input type="password" class="form-control" name="newPassword">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>