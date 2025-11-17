<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$student_id = $_POST['student_id'] ?? 0;
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$department = $_POST['department'] ?? '';

$stmt = $conn->prepare("UPDATE student_list SET firstname = ?, lastname = ?, department = ? WHERE id = ?");
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param('sssi', $first_name, $last_name, $department, $student_id);
$stmt->execute();
$stmt->close();

header('Location: index.php');
exit;
?>