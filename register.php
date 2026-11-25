<?php

include './config.php';

if(isset($_POST['submit'])){

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$check = "select * from `imagegeneratedtool`. `register` WHERE email = '$email'";

$result = mysqli_query($connection, $check);




if (mysqli_num_rows($result) > 0) {
    echo "
    <script>
        alert('Error: This Email Already Exist');
        window.location.href = 'register.php';
    </script>";
    exit();
} else {
    $sql = "INSERT INTO `imagegeneratedtool`.`register`
            (fullname, email, password)
            VALUES ('$fullname', '$email', '$password')";

    if (mysqli_query($connection, $sql)) {
        echo "
        <script>
            alert('Registration has been submitted');
            window.location.href = 'login.php';
        </script>";
        exit();
    } else {
        echo "
        <script>
            alert('Registration failed');
            window.location.href = 'register.php';
        </script>";
        exit();
    }
}

}


                          


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | AquaAuth</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>

    <div class="auth-wrapper">
        <div class="floating-shape shape-one"></div>
        <div class="floating-shape shape-two"></div>

        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100 py-5">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                    <div class="auth-card">
                        <div class="brand-icon">
                            <i class="bi bi-water"></i>
                        </div>

                        <div class="text-center mb-4">
                            <h2 class="auth-title">Create Account</h2>
                            <p class="auth-subtitle">
                                Join us and start your journey today
                            </p>
                        </div>

                        <form action="#" method="post" id="registerForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fullname" class="form-label">
                                        Full Name
                                    </label>
                                    <div class="input-group custom-input">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" id="fullname"
                                            name="fullname" class="form-control"
                                            placeholder="John Doe" required>
                                    </div>
                                </div>


                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email Address
                                </label>
                                <div class="input-group custom-input">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" id="email" name="email"
                                        class="form-control"
                                        placeholder="you@example.com" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="regPassword" class="form-label">
                                    Password
                                </label>
                                <div class="input-group custom-input">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" id="regPassword"
                                        name="password" class="form-control"
                                        placeholder="Create a strong password"
                                        minlength="8" required>
                                    <button class="input-group-text password-toggle"
                                        type="button"
                                        data-toggle-password="regPassword"
                                        aria-label="Show password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength mt-2">
                                    <div class="strength-bar" id="strengthBar"></div>
                                </div>
                                <small id="strengthText" class="text-muted">
                                    Use at least 8 characters
                                </small>
                            </div>


                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox"
                                    id="terms" name="terms" required>
                                <label class="form-check-label small" for="terms">
                                    I agree to the
                                    <a href="#" class="auth-link">Terms of Service</a>
                                    and
                                    <a href="#" class="auth-link">Privacy Policy</a>
                                </label>
                            </div>

                            <button type="submit" name="submit" class="btn auth-btn w-100">
                                Create Account
                                <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>

                        <div class="divider"><span>OR</span></div>

                        <p class="text-center auth-footer mb-0">
                            Already have an account?
                            <a href="./login.php" class="auth-link fw-semibold">
                                Sign In
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