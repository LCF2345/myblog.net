<?php

header('Content-Type: application/json');

$con = mysqli_connect('localhost', 'myblog', 'l4QkDs6K@u.V3]KV', 'myblog');

if (!$con) {
    echo json_encode(['success' => false, 'message' => 'DB connection failed']);
    exit;
}

$id = intval($_POST['id'] ?? 0);

if ($id) {
    $stmt = mysqli_prepare($con, "DELETE FROM ws_people WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
}

mysqli_close($con);