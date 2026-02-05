<?php include "includes/db.php";
include "includes/functions.php";
if (isset($_GET['categoryId'])){
    $categoryId=$_GET['categoryId'];
    $posts=$connection->query("SELECT * FROM posts WHERE category_id=$categoryId");

}
else{
    $posts=$connection->query("SELECT * FROM posts ORDER BY id DESC");
}

$categories=$connection->query("SELECT * FROM categories");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="fatemeh-code-official">
    <meta name="subject" content="book shop">
    <meta name="keywords" content="book,book shop,bookshop,booksin">
    <meta name="description" content="Booksin online book shop">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="statics/styles/basics.css">
    <link rel="icon" href="statics/images/favicon.png" type="image/png">


</head>

<body id="home">
    <!-- container -->
    <div class="container">
        <!-- Header -->
        <header class="header">
            <!-- Top header -->
            <div class="top_header d-flex justify-content-space-between">
                <!-- Logo -->
                <div class="logo d-flex align-items-center">
                    <img src="statics/images/logo.png" alt="Booksin-logo">
                    <h1>Booksin</h1>
                </div>
                <!-- Search_box -->
                <div class="search_box">
                    <form action="search.php" method="post" class="d-flex position-relative">
                        <input type="text" name="keyword" placeholder="Search...">
                        <button class="position-absolute" name="search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <!-- Top Header icons -->
                <div class="top_header_icons d-flex align-items-center">
                    <a href="/booksin/admin/pages/auth/login.php"><i class="fa-regular fa-user"></i></a>
                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-basket-shopping"></i></a>
                </div>
            </div>
            <!-- End of Top header -->
            <!-- Navigation -->
            <div class="navigation">
                <nav>
                    <ul class="navigation_bar d-flex align-items-center">
                        <li>
                            <a href="#category"><i class="fa-solid fa-table-list"></i> Category</a>
                        </li>
                        <li>
                            <a href="blog_home.php"><i class="fa-regular fa-newspaper"></i> Home</a>
                        </li>
                        <li>
                            <a href="about.php"><i class="fa-solid fa-info"></i> About us</a>
                        </li>
                        <li>
                            <a href="contact.php"><i class="fa-solid fa-phone"></i> Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End of Navigation -->
        </header>
        <!-- End of Header -->

  <!-- Responsive Navigation -->
        <nav>
            <ul class="navigation_bar_res position-fixed display-none">
                <li>
                    <a href="blog_home.php" class="d-flex column-flex align-items-center"><i class="fa-regular fa-house"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="login.php"><i class="fa-regular fa-user"></i>
                        <p>Log in</p>
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-basket-shopping"></i>
                        <p>Cart</p>
                    </a>
                </li>
                <li>
                    <a href="blog_home.php"><i class="fa-regular fa-newspaper"></i>
                        <p>Blog</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End of Responsive Navigation -->
    </div>


   