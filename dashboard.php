<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <div class="card text-center mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="card-title">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
            <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p class="card-text">User ID: <?php echo $user['id']; ?></p>
            <a href="?logout=1" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
