<?php
include 'conn.php';

if (empty($_POST['delete_id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_POST['delete_id'];

if ($stmt = $conn->prepare('DELETE FROM student_list WHERE id = ?')) {
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

header('Location: index.php');
exit;
?>