<?php
session_start();

$path = $_SERVER['REQUEST_URI'];
if (str_contains($path, 'pages')) {
    include '../../../includes/db.php';
    include '../../../includes/functions.php';
    $cssPath = '../../statics/index.css';
} 
else {
    include '../includes/db.php';
    include '../includes/functions.php';
    $cssPath = 'statics/index.css';
}

if (empty($_SESSION['email'])){
    $error="Please login first!";
    header("Location:pages/auth/login.php?error=$error");
}

$posts = $connection->query("SELECT * FROM posts");
$comments = $connection->query("SELECT * FROM comments");
$categories = $connection->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
          rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $cssPath ?>">

    <title>Admin panel</title>
</head>

<body>
