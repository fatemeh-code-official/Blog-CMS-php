<?php include '../../includes/header.php' ;

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $category=$connection->query("SELECT *  FROM categories WHERE id=$id")->fetch();
}


$inputError='';
if (isset($_POST['edit'])){
    $title=$_POST['title'];
    $id=$_POST['id'];
    if(!empty($title)){
        $updateCategory=$connection->query("UPDATE categories SET title=('$title') where id=$id");
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
     <div class="dashboard" style="margin:4rem 3rem 4rem 20rem">

      <div class="d-flex justify-content-space-between">
        <h2 class="d_title">Edit Category</h2>
        
      </div>

      <form action="edit.php" class="d-flex column-flex" method="post">
        <label for="cat"></label>
        <input type="text" name="title" id="cat" value="<?= $category['title'] ?>" class="new_items">
        <?php if (!empty($inputError)) :?>
            <div class="alert"><?= $inputError ?></div>
        <?php endif?>
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" class="new" name="edit">Save</button>
      </form>

    </div>
</main>
</body>