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
    <div class="row mb-3 d-flex justify-content-between">
        <div class="col-5">
            <?php
            echo $_SESSION['user']['role'];
            ?>
            :
            <?php
            echo $_SESSION['user']['username'];
            ?>
        </div>
        <div class="col-5">Email:
            <?php
            echo $_SESSION['user']['email'];
            ?>
        </div>
    </div>
    <div class="row d-flex justify-content-between">
        <?php
        if ($_SESSION['user']['role'] == "Research Study Manager" || $_SESSION['user']['role'] == "Research Group Manager") {
            echo '<div class="card mb-3 col-md-5"><div class="card-body p-4 text-center"><a class="link-danger" href="">Create New Study</a></div></div>';
        }
        ?>
        <div class="card mb-3 col-md-5">
            <div class="card-body p-4 text-center"><a class="link-danger" href="">View All Studies</a></div>
        </div>
    </div>
    <div class="row d-flex justify-content-between">
        <?php
        if ($_SESSION['user']['role'] == "Research Study Manager" || $_SESSION['user']['role'] == "Research Group Manager") {
            echo '
                    <div class="card mb-3 col-md-5"><div class="card-body p-4 text-center"><a class="link-danger" href="">Delete Previous Study</a></div></div>
                    ';
        }
        ?>
        <?php
        if ($_SESSION['user']['role'] == "Research Group Manager") {
            echo '
                    <div class="card mb-3 col-md-5"><div class="card-body p-4 text-center">
                        <a class="link-danger" href="http://localhost/create">Create New Researcher</a>
                    </div>
                    ';
        }
        ?>
    </div>
</div>
<?php
require_once 'tpl/footer.html';
