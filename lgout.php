<?php

session_start();


if (session_destroy()) {

    header("Location: messages.php");
    exit;
}
?>
