<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="index.php" class="nav-link text-secondary">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#home"></use>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="?action=admin" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-end">
            <div class="text-end">
                <?php $this->renderChild('nav-links'); ?>
            </div>
        </div>
    </div>

</header>