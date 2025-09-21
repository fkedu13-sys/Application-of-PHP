<?php
session_start();

// Dummy user data
$users = [
    1 => ['email' => 'user@example.com', 'password' => '1234', 'name' => 'John Doe']
];

// Handle login POST
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    foreach ($users as $id => $userData) {
        if ($userData['email'] === $email && $userData['password'] === $password) {
            $_SESSION['user'] = [
                'id' => $id,
                'email' => $userData['email'],
                'name' => $userData['name']
            ];
            header("Location: dashboard.php"); // redirect to dashboard
            exit;
        }
    }

    $error = "Invalid email or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <?php if ($error): ?>
                                <p class="text-danger"><?php echo $error; ?></p>
                            <?php endif; ?>

                            <form method="POST" action="">
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" required/>
                                    <label class="form-label">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" required/>
                                    <label class="form-label">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white mx-4 px-2"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
