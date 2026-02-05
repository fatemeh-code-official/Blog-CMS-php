<?php include "../../../includes/db.php";

session_start();

if(isset($_POST['send'])){
    $email=$_POST['email']; 
    $password=$_POST['password']; 

    $checkUser=$connection->query("SELECT * FROM users WHERE email='$email' AND password='$password'");

    if ($checkUser->rowCount()>=1){

        $_SESSION['email']=$email;
        header("Location:../../index.php");
    }
    //Entering admin panel
    else{
        $error="Invalid username or password!";
        header("Location:login.php?error=$error");
    }
}

?>

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
    <link rel="stylesheet" href="../../../statics/styles/basics.css">
    <link rel="stylesheet" href="../../statics/login.css">
    <link rel="icon" href="../../../statics/images/favicon.png" type="image/png">
    <title>Login</title>
</head>

<body>
    <!-- Login container -->
    <div class="login_container d-flex column-flex align-items-center">
        <!-- Logo -->
        <div class="logo d-flex align-items-center">
            <img src="../../../statics/images/logo.png" alt="Booksin-logo">
            <h1 class="logo_title">Booksin</h1>
        </div>
        <!-- End of Logo -->

        <!-- Main Title -->
        <h2 class="main_title">Login</h2>
        <!-- End of Main Title -->

        <!-- Login form -->
         <?php if (isset($_GET['error'])):?>
            <div class="alert"><?= $_GET['error'] ?></div>
        <?php endif ?>
        <form action="login.php" class="login_form d-flex column-flex" method="post">
            <label for="email"><i class="fa-regular fa-user form_icons"></i></label>
            <input type="email" id="email" name="email" placeholder="Enter email..." class="form_inputs">
            <label for="password"><i class="fa-solid fa-lock form_icons"></i></label>
            <input type="password" name="password" id="password" placeholder="Enter password" class="form_inputs">
            <input type="submit" value="Send" class="submit_btn" name="send">
        </form>
        <!-- End of Login form -->

    </div>
    <!-- End of Login container -->
</body>

</html>