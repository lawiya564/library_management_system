<?php
include("db.php");

$result = $conn->query("SELECT * FROM Student ORDER BY student_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Library Management System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form-container">

        <h2>Student Registration</h2>

        <form action="save_student.php" method="POST">

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">

            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <button type="submit">Register Student</button>

        </form>

    </div>

<div class="students-container">

        <h2>Registered Students</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php while ($student = $result->fetch_assoc()) { ?>

                <tr>

                    <td><?php echo $student['student_id']; ?></td>

                    <td><?php echo $student['first_name']; ?></td>

                    <td><?php echo $student['last_name']; ?></td>

                    <td><?php echo $student['phone']; ?></td>

                    <td><?php echo $student['email']; ?></td>

                    <td>
                        <a href="view_student.php?id=<?php echo $student['student_id']; ?>">View</a> |
 <a href="edit_student.php?id=<?php echo $student['student_id']; ?>">
                            Edit
                        </a>

                        <a href="delete_student.php?id=<?php echo $student['student_id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this student?');">
                            Delete
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </table>

    </div>

</body>
</html>

<?php
$conn->close();
?>