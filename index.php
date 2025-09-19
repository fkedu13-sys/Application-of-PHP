<?php
$title = "Welcome to My PHP Page";

// Check if the form was submitted and get the name
if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
    // Sanitize user input to prevent XSS
    $name = htmlspecialchars(trim($_POST['name']));
} else {
    $name = "Guest";
}

$hour = date("H");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?php echo $title; ?></h1>

    <form method="post" action="">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" placeholder="Your name" />
        <button type="submit">Submit</button>
    </form>

    <p>Hello, <?php echo $name; ?>! This is a simple PHP page with HTML.</p>

    <?php
    if ($hour < 12) {
        echo "<p>Good morning!</p>";
    } elseif ($hour < 18) {
        echo "<p>Good afternoon!</p>";
    } else {
        echo "<p>Good evening!</p>";
    }
    ?>
</body>
</html>
