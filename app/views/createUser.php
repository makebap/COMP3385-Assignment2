<?php
require_once('tpl/header.html');
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Research Study Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li class="nav-item"><a class="nav-link" href="http://localhost/register">Register</a></li>';
                }
                ?>
            </ul>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="mx-2"><i class="fa fa-user-circle"></i> <?php
                                                                        echo $_SESSION['user']['username'];
                                                                        ?>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../controllers/LogoutController.php">Log out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mb-3">
        <div class="col-6">Researcher:
            <?php
            echo $_SESSION['user']['username'];
            ?>
        </div>
        <div class="col-6">Email:
            <?php
            echo $_SESSION['user']['email'];
            ?>
        </div>
    </div>
    <form action="../controllers/CreateUserController.php" method="post" class="col-md-6 offset-md-3 mb-4">
        <h1 class="mb-3 text-center">Create user</h1>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="usernameInput" name="username" placeholder="username">
            <label for="usernameInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailInput" name="email" placeholder="name@example.com">
            <label for="emailInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="passwordInput">
            <label for="passwordInput">Password</label>
        </div>
        <div class="mb-3">
            <label for="roleSelect">Role</label>
            <select id="roleSelect" name="role" class="form-select" aria-label="Role select">
                <option selected value="Research Study Manager">Research Study Manager</option>
                <option value="Researcher">Researcher</option>
            </select>
        </div>
        <div class="d-grid gap-2 mb-3">
            <button class="btn btn-secondary" type="submit">Create user</button>
        </div>
    </form>
</div>
<?php
require_once 'tpl/footer.html';
