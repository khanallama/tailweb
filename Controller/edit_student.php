<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include '../Helper/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    updateStudent($id, $name, $subject, $marks);
    header("Location: ../View/home.php");
}
