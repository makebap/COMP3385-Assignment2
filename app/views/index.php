<?php

use Core\Session;

require_once('C:/xampp/htdocs/app/views/tpl/header.html');
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Research Study Management</a>
    </div>
</nav>
<div class="container">
    <form action="../controllers/LogInController.php" method="post" class="col-md-6 offset-md-3 mb-4">
        <h1 class="mb-3 text-center">Log in</h1>
        <?php
        if (isset($_POST['errors']['login'])) {
            echo '<p class="text-danger font-weight-bold">' . $_POST['errors']['login'] . '</p>';
        }
        ?>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailInput" name="email" placeholder="name@example.com" <?php
                                                                                                                    if (isset($_POST['email'])) {
                                                                                                                        echo 'value="' . $_POST['email'] . '"';
                                                                                                                    }
                                                                                                                    ?>>
            <label for="emailInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" <?php
                                                                                                                    if (isset($_POST['password'])) {
                                                                                                                        echo 'value="' . $_POST['password'] . '"';
                                                                                                                    }
                                                                                                                    ?>>
            <label for="passwordInput">Password</label>
        </div>
        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-secondary" type="submit">Log in</button>
        </div>
    </form>
    <div class="text-center mb-4">
        <a href="#">Don't have an account?</a>
    </div>
</div>
<?php
require_once './tpl/footer.html';
