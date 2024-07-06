<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
include '../Helper/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $student = existStudent($name, $subject);

    if ($student) {
        updateStudent($student['id'], $name, $subject, $marks);
    } else {
        addStudent($name, $subject, $marks);
    }
    header("Location: ../View/home.php");
}
