<?php

session_start();

session_destroy();
session_abort();

 $error="Please login first!";
    header("Location:login.php?error=$error");

?>