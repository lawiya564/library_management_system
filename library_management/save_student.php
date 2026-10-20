<?php

require_once "db.php";

$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';

$sql = "INSERT INTO Student (first_name, last_name, phone, email)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssss",
    $first_name,
    $last_name,
    $phone,
    $email
);

if ($stmt->execute()) {
    echo "Student registered successfully!";
    echo "<br>";
    echo "Student ID: " . $stmt->insert_id;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>