<div class="container">
    <form action="?action=customer/registerPost" method="post">
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