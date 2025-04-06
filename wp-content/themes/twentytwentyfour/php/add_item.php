<?php

header('Content-Type: application/json');

$con = mysqli_connect('localhost', 'myblog', 'l4QkDs6K@u.V3]KV', 'myblog');

if (!$con) {
    echo json_encode(['success' => false, 'message' => 'DB connection failed']);
    exit;
}

$username = $_POST['username'] ?? '';
$name = $_POST['name'] ?? '';
$profession = $_POST['profession'] ?? '';

if ($username && $name && $profession) {
    $stmt = mysqli_prepare($con, "INSERT INTO ws_people (`username`, `full_name`, `profession`) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $username, $name, $profession);
    mysqli_stmt_execute($stmt);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing username or name or profession']);
}

mysqli_close($con);
?>