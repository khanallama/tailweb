<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include '../Helper/functions.php';

$students = getStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <script src="../assets/js/scripts.js"></script>

</head>
<body>
<div class="header">
    <div class="logo">tailwebs.</div>
    <div class="nav">
        <a href="#">Home</a>
        <a href="../Controller/logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </div>
</div>
<div class="container">
    <table>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Mark</th>
            <th>Action</th>
        </tr>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td>
                    <span class="avatar"><?php echo substr($student['name'], 0, 1); ?></span>
                    <?php echo $student['name']; ?>
                </td>
                <td><?php echo $student['subject']; ?></td>
                <td><?php echo $student['marks']; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="action-btn" onclick="toggleDropdown(<?php echo $student['id']; ?>)">&#8942;
                        </button>
                        <div id="dropdown-<?php echo $student['id']; ?>" class="dropdown-content">
                            <a href="#"
                               onclick="showEditModal(<?php echo $student['id']; ?>, '<?php echo $student['name']; ?>', '<?php echo $student['subject']; ?>', <?php echo $student['marks']; ?>)">Edit</a>
                            <a href="#" onclick="deleteStudent(<?php echo $student['id']; ?>)">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
    <button class="add-btn" onclick="document.getElementById('addStudentModal').style.display='block'">Add</button>
</div>

<div id="addStudentModal" class="modal">
    <div class="modal-content">
        <form method="post" action="../Controller/add_student.php">
            <h2>Add Student</h2>
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="text" id="subject" name="subject" placeholder="Subject" required>
            <input type="number" id="marks" name="marks" placeholder="Mark" required>
            <button type="submit">Add</button>
        </form>
    </div>
</div>

<div id="editStudentModal" class="modal">
    <div class="modal-content">
        <form id="editStudentForm" method="post" action="../Controller/edit_student.php">
            <h2>Edit Student</h2>
            <label for="editName"></label>
            <input type="text" id="editName" name="name" placeholder="Name" required>
            <label for="editSubject"></label>
            <input type="text" id="editSubject" name="subject" placeholder="Subject" required>
            <label for="editMarks"></label>
            <input type="number" id="editMarks" name="marks" placeholder="Mark" required>
            <input type="hidden" id="editStudentId" name="id">
            <button type="submit">Edit</button>
        </form>
    </div>
</div>
</body>
</html>