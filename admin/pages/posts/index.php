<?php include '../../includes/header.php' ; 

$posts = $connection->query("SELECT * FROM posts");

if (isset($_GET['id']) and isset($_GET['table'])){

  delete_from_table($_GET['id'],$_GET['table']);

}
?>

<link rel="stylesheet" href="../../statics/index.css">


<main class="d-flex">
    <?php include '../../includes/sidebar.php'; ?>

  <!-- Dashboard -->
    <div class="dashboard" style="margin:4rem 2rem 4rem 21rem;">

      <div class="d-flex justify-content-space-between align-items-center">
        <h2 class="d_title">Posts</h2>
        <a href="create.php" class="new">Create New Post</a>
      </div>
      <table>
        <tr>
          <th>Id</th>
          <th>Row</th>
          <th>Subject</th>
          <th>Author</th>
          <th>Operation</th>
        </tr>

        <?php
        $row = 1;
        foreach ($posts as $post): ?>
          <tr class="row_content">
            <td><?= $post['id'] ?></td>
            <td><?= $row ?></td>
            <td><?= substr($post['title'], 0, 30) . '...' ?></td>
            <td><?= $post['author'] ?></td>
            <td>
              <a href="edit.php?id=<?= $post['id'] ?>" id="edit" class="default_btn">Edit</a>
              <a href="index.php?id=<?= $post['id'] ?>&table=posts" id="delete" class="default_btn">Delete</a>
            </td>
          </tr>
        <?php
          $row++;
        endforeach ?>
      </table>

    </div>