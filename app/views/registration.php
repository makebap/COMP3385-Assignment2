<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/app.css">
    <title>ResearchPro - Registration</title>
</head>

<body>
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
        <form action="../controllers/RegistrationController.php" method="post" class="col-md-6 offset-md-3 mb-4">
            <h1 class="mb-3 text-center">Sign up</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="emailInput" name="email" placeholder="name@example.com" <?php
                                                                                                                    if (isset($_POST['email'])) {
                                                                                                                        echo 'value="' . $_POST['email'] . '"';
                                                                                                                    }
                                                                                                                    ?>>
                <label for="emailInput">Email address</label>
                <?php
                if (isset($_POST['errors']['email'])) {
                    echo '<p class="text-danger font-weight-bold">' . $_POST['errors']['email'] . '</p>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="confEmailInput" name="confEmail" placeholder="name@example.com" <?php
                                                                                                                            if (isset($_POST['email'])) {
                                                                                                                                echo 'value="' . $_POST['confEmail'] . '"';
                                                                                                                            }
                                                                                                                            ?>>
                <label for="confEmailInput">Confirm Email address</label>
                <?php
                if (isset($_POST['errors']['confEmail'])) {
                    echo '<p class="text-danger font-weight-bold">' . $_POST['errors']['confEmail'] . '</p>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usernameInput" name="username" placeholder="username" <?php
                                                                                                                    if (isset($_POST['username'])) {
                                                                                                                        echo 'value="' . $_POST['username'] . '"';
                                                                                                                    }
                                                                                                                    ?>>
                <label for="usernameInput">Username</label>
                <?php
                if (isset($_POST['errors']['username'])) {
                    echo '<p class="text-danger font-weight-bold">' . $_POST['errors']['username'] . '</p>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" <?php
                                                                                                                        if (isset($_POST['password'])) {
                                                                                                                            echo 'value="' . $_POST['password'] . '"';
                                                                                                                        }
                                                                                                                        ?>>
                <label for="passwordInput">Password</label>
                <?php
                if (isset($_POST['errors']['password'])) {
                    echo '<p class="text-danger font-weight-bold">' . $_POST['errors']['password'] . '</p>';
                }
                ?>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confPasswordInput" name="confPassword" placeholder="confPasswordInput" <?php
                                                                                                                                        if (isset($_POST['confPassword'])) {
                                                                                                                                            echo 'value="' . $_POST['confPassword'] . '"';
                                                                                                                                        }
                                                                                                                                        ?>>
                <label for="floatingPassword">Confirm Password</label>
                <?php
                if (isset($_POST['errors']['confPass'])) {
                    echo '<p class="text-danger font-weight-bold">' . $_POST['errors']['confPass'] . '</p>';
                }
                ?>
            </div>
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-secondary" type="submit">Register</button>
            </div>
        </form>
    </div>
    <footer class="row border-top p-2">
        <div class="text-center">Copyright &copy; Makeba Proverbs. All Rights Reserved</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>