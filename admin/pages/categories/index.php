<?php include '../../includes/header.php' ;

if (isset($_GET['id']) and isset($_GET['table'])){

  delete_from_table($_GET['id'],$_GET['table']);

}

?>
<link rel="stylesheet" href="../../assets/css/index.css">


<main class="d-flex">
    <?php include '../../includes/sidebar.php'; ?>

    <!-- Categories -->
     <div class="dashboard" style="margin: 3rem 4rem 3rem 20rem;">

      <div class="d-flex justify-content-space-between">
        <h2 class="d_title">Categories</h2>
        <a href="create.php" class="new">Create New Category</a>
      </div>

      <table>
        <tr>
          <th>Row</th>
          <th>Id</th>
          <th>Subject</th>
          <th>Operation</th>
        </tr>

        <?php
        $row = 1;
        foreach ($categories as $category): ?>
          <tr class="row_content">
            <td><?= $row ?></td>
            <td><?= $category['id'] ?></td>
            <td><?= $category['title']?></td>
            <td>
              <a href="edit.php?id=<?= $category['id'] ?>" id="edit" class="default_btn">Edit</a>
              <a href="index.php?id=<?= $category['id'] ?>&table=categories" id="delete" class="default_btn">Delete</a>
            </td>
          </tr>
        <?php
          $row++;
        endforeach ?>
      </table>

    </div>
</main>
</body>