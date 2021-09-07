<?php $messages = $this->getMessages(); ?>
<?php if ($messages) : ?>
    <?php foreach ($messages as $message) : ?>
        <div class="col-7 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> <?= $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endforeach ?>
<?php endif ?>