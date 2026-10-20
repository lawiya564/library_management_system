<?php
require_once "db.php";

$student_id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM Student WHERE student_id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-container">

    <h2>Student Details</h2>

    <p><strong>Student ID:</strong>
        <?php echo htmlspecialchars($student['student_id']); ?>
    </p>

    <p><strong>First Name:</strong>
        <?php echo htmlspecialchars($student['first_name']); ?>
    </p>

    <p><strong>Last Name:</strong>
        <?php echo htmlspecialchars($student['last_name']); ?>
    </p>

    <p><strong>Phone:</strong>
        <?php echo htmlspecialchars($student['phone']); ?>
    </p>

    <p><strong>Email:</strong>
        <?php echo htmlspecialchars($student['email']); ?>
    </p>

    <br>

    <a href="student_form.php">← Back to Students</a>

</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>