<?php
include '../config.php';


/**
 * check user exist or not
 *
 * @param $username
 * @param $password
 * @return array|false
 */
function authenticate($username, $password)
{
    global $conn;
    $sql = "SELECT * FROM `teachers` WHERE `username` = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_array();

    if ($user > 0) {
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}

/**
 * get all student data
 *
 * @return bool|mysqli_result
 */
function getStudents()
{
    global $conn;
    $teacher = $_SESSION['user']['id'];
    $sql = "SELECT * FROM students WHERE `teacher_id` = '$teacher'";
    return $conn->query($sql);
}

/**
 * create new student data
 *
 * @param $name
 * @param $subject
 * @param $marks
 */
function addStudent($name, $subject, $marks)
{
    global $conn;
    $teacher = $_SESSION['user']['id'];
    $sql = "INSERT INTO students (`name`, `subject`, `marks` , `teacher_id`) VALUES ('$name', '$subject', '$marks' ,'$teacher' )";
    $conn->query($sql);

}

/**
 * check user exist or not
 *
 * @param $name
 * @param $subject
 * @return array|false|null
 */
function existStudent($name, $subject)
{
    global $conn;
    $sql = "SELECT * FROM `students` WHERE `name` = '$name' AND `subject` = '$subject' ";
    $result = $conn->query($sql);
    return $result->fetch_array();

}


/**
 * update the student data by id
 *
 * @param $id
 * @param $name
 * @param $subject
 * @param $marks
 */
function updateStudent($id, $name, $subject, $marks)
{
    global $conn;
    $sql = "UPDATE `students` SET `name` = '$name', `subject` = '$subject', `marks` = '$marks' WHERE `id` = '$id'";
    $conn->query($sql);
}

/**
 * method use to delete the student by id
 *
 * @param $id
 */
function deleteStudent($id)
{
    global $conn;
    $sql = "DELETE FROM `students` WHERE `id` = '$id'";
    $conn->query($sql);
}

/**
 * method use for logout or destroy the current session
 *
 * @return bool
 */
function logout()
{
    session_start();

    if (session_destroy()) {
        return true;
    } else {
        return false;
    }

}

/**
 * @param $username
 * @param $password
 * @return bool|mysqli_result
 */
function registerUser($username, $password)
{
    global $conn;
    $sql = "SELECT * FROM `teachers` WHERE `username` = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return false;
    }

    $sql = "INSERT INTO `teachers` (`username`, `password`) VALUES ('$username', '$password')";
    return $conn->query($sql);
}