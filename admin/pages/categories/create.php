<?php include '../../includes/header.php' ;

$inputError='';

if (isset($_POST['send'])){
    $title=$_POST['title'];
    if(!empty($title)){
        $createCategory=$connection->query("INSERT INTO categories(title) VALUES ('$title')");
        header("Location:index.php");
    }
    else{
        $inputError='Please enter a category name!';
    }
}

?>
<link rel="stylesheet" href="../../assets/css/index.css">


<main class="d-flex">
    <?php include '../../includes/sidebar.php'; ?>

    <!-- Categories -->
     <div class="dashboard" style="margin:4rem 2rem 2rem 20rem">

      <div class="d-flex justify-content-space-between">
        <h2 class="d_title">Create New Category</h2>
        
      </div>

      <form action="create.php" class="d-flex column-flex" method="post">
        <label for="cat"></label>
        <input type="text" name="title" id="cat" placeholder="New Category" class="new_items">
        <?php if (!empty($inputError)) :?>
            <div class="alert"><?= $inputError ?></div>
        <?php endif?>
        <button type="submit" class="new" name="send">Save</button>
      </form>

    </div>
</main>
</body>