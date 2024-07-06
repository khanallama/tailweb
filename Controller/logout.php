<?php

include '../Helper/functions.php';

if (logout()) {
    header("Location: ../View/login.php");
} else {
    echo "Logout failed";
}