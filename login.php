<?php

include './config.php';

if (isset($_POST['submit'])) {


    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "select * from `imagegeneratedtool`. `register` WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($connection, $check);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['regid'];
        header("location: home.php");
        exit();


        echo "
    <script>
        alert('login successfully');
        window.location.href = 'home.php';
    </script>";
        exit();
    } else {
        echo "
    <script>
        alert('Error: invalid email and password');
        window.location.href = 'login.php';
    </script>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AquaAuth</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>

    <div class="auth-wrapper">
        <div class="floating-shape shape-one"></div>
        <div class="floating-shape shape-two"></div>

        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-12 col-sm-10 col-md-8 col-lg-5">

                    <div class="auth-card">
                        <div class="brand-icon">
                            <i class="bi bi-water"></i>
                        </div>

                        <div class="text-center mb-4">
                            <h2 class="auth-title">Welcome Back</h2>
                            <p class="auth-subtitle">
                                Sign in to continue to your account
                            </p>
                        </div>

                        <form method="post">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group custom-input">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" id="email" name="email"
                                        class="form-control"
                                        placeholder="you@example.com" required>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group custom-input">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" id="password"
                                        name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                    <button class="input-group-text password-toggle"
                                        type="button" data-toggle-password="password"
                                        aria-label="Show password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="remember" name="remember">
                                    <label class="form-check-label small" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="auth-link small">
                                    Forgot password?
                                </a>
                            </div>

                            <button type="submit" name="submit" class="btn auth-btn w-100">
                                Sign In <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>

                        <div class="divider"><span>OR</span></div>

                        <p class="text-center auth-footer mb-0">
                            Don't have an account?
                            <a href="./register.php" class="auth-link fw-semibold">
                                Create Account
                            </a>
                        </p>
                    </div>

                    <p class="text-center copyright">
                        © 2026 AquaAuth. All rights reserved.
                    </p>

                </div>
            </div>
        </div>
    </div>

    <script src="./assets/script.js"></script>
</body>

</html>