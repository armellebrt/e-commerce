<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container m-3">
        <a href="?action=admin/customer"><i class="bi bi-arrow-left"></i> Back </a>
        <div class="container">
            <h2 class='m-4'>Create a customer</h2>
            <form action="?action=admin/customer/createPost" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_verify" class="form-label">Password confirmation</label>
                    <input type="password" class="form-control" name="password_verify">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="lastname">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>