<?php include '../../includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = $connection->query("SELECT * FROM posts WHERE id=$id")->fetch();
}

$categories = $connection->query("SELECT * FROM categories");

if (isset($_POST['save_post'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $views = $_POST['views'];
    $published_date = $_POST['published_date'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];

    if (!empty($title) && !empty($author) && !empty($published_date) && !empty($content)) {

        if (!empty($imageName)) {
            $oldImage = $post['image'];
            unlink("../../../statics/images/Blog/$oldImage");

            $imageName = time() . $imageName;
            move_uploaded_file($imageTmpName, "../../../statics/images/Blog/$imageName");

            $connection->query("
                UPDATE posts SET 
                title='$title',
                author='$author',
                counted_views='$views',
                published_date='$published_date',
                category_id='$category',
                image='$imageName'
                WHERE id=$id
            ");
        } else {
            $connection->query("
                UPDATE posts SET 
                title='$title',
                author='$author',
                counted_views='$views',
                published_date='$published_date',
                category_id='$category'
                WHERE id=$id
            ");
        }

        header("Location:index.php");
        exit;
    }
}
?>

<style>
    form {
        padding-top: 1rem;
        gap: 1rem;
    }

    form div {
        margin-top: 0.5rem;
        gap: 0.5rem;
    }

    form .number {
        height: 100%;
        border: 2px solid var(--clr-gray);
    }

    form .number:focus {
        outline: none;
    }

    form textarea {
        resize: none;
        height: 10rem;
    }

    form select {
        border: 2px solid var(--clr-gray);
        padding: 0.5rem;
    }

    form select:focus {
        outline: none;
    }
</style>

<link rel="stylesheet" href="../../assets/css/index.css">

<main class="d-flex">
    <?php include '../../includes/sidebar.php'; ?>

    <div class="dashboard" style="margin: 3rem 30%;">

        <div class="d-flex justify-content-space-between">
            <h2 class="d_title">Edit Post</h2>
        </div>

        <form action="edit.php" method="post" enctype="multipart/form-data" class="d-flex column-flex">
            <label for="title" class="lables">Post title</label>
            <input type="text" name="title" id="title" class="inputs"
                   required value="<?= $post['title'] ?>">

            <div class="d-flex">
                <div class="d-flex column-flex">
                    <label for="author" class="lables">Author</label>
                    <input type="text" id="author" name="author" class="inputs"
                           required value="<?= $post['author'] ?>">
                </div>

                <div class="d-flex column-flex">
                    <label for="views" class="lables">Counted views</label>
                    <input type="number" id="views" name="views"
                           class="number" value="<?= $post['counted_views'] ?>">
                </div>

                <div class="d-flex column-flex">
                    <label for="published_date" class="lables">Published_date</label>
                    <input type="date" id="published_date" name="published_date"
                           class="inputs" required value="<?= $post['published_date'] ?>">
                </div>
            </div>

            <label for="content" class="lables">Content</label>
            <textarea name="content" id="content" class="inputs" required><?= $post['content'] ?></textarea>

            <label for="category" class="lables">Category</label>
            <select name="category" id="category">
                <?php foreach ($categories as $categorty): ?>
                    <option value="<?= $categorty['id'] ?>"
                        <?= $categorty['id'] == $post['category_id'] ? 'selected' : '' ?>>
                        <?= $categorty['title'] ?>
                    </option>
                <?php endforeach ?>
            </select>

            <label for="image" class="lables">Choose post photo</label>
            <input type="file" name="image">

            <br><br>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" name="save_post" class="send_btn">Submit</button>
        </form>

    </div>
</main>
</body>
