<?php
$customerSession = $this->getSession();
?>
<ul class="d-inline-flex mb-2 mb-lg-0">
    <?php if ($customerSession->isLoggedIn()) : ?>
        <li class='list-unstyled'>
            <a class="nav-link" href="?action=customer/account">My account</a>
        </li>
    <?php else : ?>
        <li class='list-unstyled'>
            <a href="?action=customer/login"><button type="button" class="btn btn-light text-dark me-2">Login</button></a>
        </li>
        <li class='list-unstyled'>
            <a href="?action=customer/register"><button type="button" class="btn btn-primary">Sign-up</button></a>
        </li>
    <?php endif; ?>



</ul>