<?php $customers = $this->renderList(); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class='m-5'>
        <h1 class='mb-5 mt-3'>List of customers</h1>
    </div>

    <div class="mx-auto col-11 table-responsive">

        <a href="?action=admin/customer/create"><button class="btn btn-secondary ms-1 mb-3">Add a customer</button></a>
        <table class="table table-sm align-middle table-hover table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($customers as $customer) :
                ?>
                    <tr>
                        <th class='col-md-1'><?= $customer->getId() ?></th>
                        <td class='col-md-2'><?= $customer->getEmail() ?></td>
                        <td class='col-md-1'><?= $customer->getLastname() ?></td>
                        <td class='col-md-2'><?= $customer->getFirstname() ?></td>
                        <td class='col-md-1'><a class="btn btn-success" href="?action=admin/customer/edit&id=<?= $customer->getData('id') ?>">Edit</button></td>
                        <td class='col-md-1'><a class="btn btn-danger" href="?action=admin/customer/delete&id=<?= $customer->getId() ?>">Delete</button></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</main>