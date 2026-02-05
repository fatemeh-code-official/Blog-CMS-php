<?php include 'includes/header.php' ;

//Just to show 4 last rows in tables in index.php
$posts = $connection->query("SELECT * FROM posts LIMIT 4");
$comments = $connection->query("SELECT * FROM comments LIMIT 4");
$categories = $connection->query("SELECT * FROM categories LIMIT 4");

if (isset($_GET['id']) and isset($_GET['table'])){

  delete_from_table($_GET['id'],$_GET['table']);

}
?>

<main class="d-flex">

  <?php include 'includes/sidebar.php' ?>

  <!-- Content -->
  <div class="content d-flex column-flex">

    <!-- Dashboard -->
    <div class="dashboard">

      <h2 class="d_title">Dashboard</h2>
      <!-- Title -->
      <p class="recent">Recent Posts</p>

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
              <a href="/booksin/admin/pages/posts/edit.php?id=<?= $post['id'] ?>" id="edit" class="default_btn">Edit</a>
              <a href="index.php?id=<?= $post['id'] ?>&table=posts" id="delete" class="default_btn">Delete</a>
            </td>
          </tr>
        <?php
          $row++;
        endforeach ?>

      </table>

    </div>

    <!-- Comments -->
     <div class="dashboard">

      <h2 class="d_title">Comments</h2>
      <!-- Title -->
      <p class="recent">Recent Comments</p>

      <table>
        <tr>
          <th>Row</th>
          <th>Id</th>
          <th>Subject</th>
          <th>name</th>
          <th>Operation</th>
        </tr>

        <?php
        $row = 1;
        foreach ($comments as $comment): ?>
          <tr class="row_content">
            <td><?= $row ?></td>
            <td><?= $comment['id'] ?></td>
            <td><?= $comment['subject']?></td>
            <td><?= $comment['name'] ?></td>
            <td>
              <a href="#" id="accepting" class="default_btn">Accepting</a>
              <a href="index.php?id=<?= $comment['id'] ?>&table=comments" id="delete" class="default_btn">Delete</a>
            </td>
          </tr>
        <?php
          $row++;
        endforeach ?>
      </table>

    </div>

     <!-- Categories -->
     <div class="dashboard">

      <h2 class="d_title">Categories</h2>

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
              <a href="/booksin/admin/pages/categories/edit.php?id=<?= $post['category_id'] ?>" id="edit" class="default_btn">Edit</a>
              <a href="index.php?id=<?= $category['id'] ?>&table=categories" id="delete" class="default_btn">Delete</a>
            </td>
          </tr>
        <?php
          $row++;
        endforeach ?>
      </table>

    </div>
  </div>

</main>
</body>

</html>