<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include '../Helper/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    deleteStudent($id);
    header("Location: ../View/home.php");
}
