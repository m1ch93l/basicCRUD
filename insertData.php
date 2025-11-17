<?php
include 'conn.php';

$firstname  = $_POST['fname'] ?? '';
$lastname   = $_POST['lname'] ?? '';
$department = $_POST['dept'] ?? '';

if ($stmt = $conn->prepare("INSERT INTO student_list (firstname, lastname, department) VALUES (?, ?, ?)")) {
    $stmt->bind_param("sss", $firstname, $lastname, $department);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>