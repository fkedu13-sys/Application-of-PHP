<?php
session_start();

if (!isset($SESSION['messages'])) {
 $_SESSION['messages'] = [];   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Anonymous';
    $message = $_POST['message'] ?? '';

    if ($message) {
        $_SESSION['messages'][] = [
            'name' => $name,
            'message' => $message
        ];
    }
}


?>