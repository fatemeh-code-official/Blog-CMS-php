<?php include '../../includes/header.php';

//Loading categories
$categories = $connection->query("SELECT * FROM categories");

//Button save new post
if (isset($_POST['save_post'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $counted_views = $_POST['views'];
    $published_date = $_POST['published_date'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];

    if (!empty($title) && !empty($author) && !empty($published_date) && !empty($imageName) && !empty($content)) {

        $imageName = time() . $imageName;
        move_uploaded_file($imageTmpName, "../../../statics/images/Blog/$imageName");

        $createPost=$connection->query("
            INSERT INTO posts (title, content, image, author, category_id, published_date, counted_views)
            VALUES ('$title', '$content', '$imageName', '$author', '$category', '$published_date', '$counted_views')
        ");

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

    <!-- Posts -->
    <div class="dashboard" style="margin: 3rem 30%;">

        <div class="d-flex justify-content-space-between">
            <h2 class="d_title">Create New Post</h2>
        </div>

        <form action="create.php" method="post" enctype="multipart/form-data" class="d-flex column-flex">
            <label for="title" class="lables">Post title</label>
            <input type="text" name="title" id="title" class="inputs" placeholder="Only 255 chars..." required>

            <div class="d-flex">
                <div class="d-flex column-flex">
                    <label for="author" class="lables">Author</label>
                    <input type="text" id="author" name="author" class="inputs" placeholder="only 255 chars..." required>
                </div>

                <div class="d-flex column-flex">
                    <label for="views" class="lables">Counted views</label>
                    <input type="number" id="views" name="views" class="number">
                </div>

                <div class="d-flex column-flex">
                    <label for="published_date" class="lables">Published_date</label>
                    <input type="date" id="published_date" name="published_date" class="inputs" required>
                </div>
            </div>

            <label for="content" class="lables">Content</label>
            <textarea name="content" id="content" class="inputs" placeholder="Post body..." required></textarea>

            <label for="category" class="lables">Category</label>
            <select name="category" id="category">
                <?php foreach ($categories as $categorty): ?>
                    <option value="<?= $categorty['id'] ?>"><?= $categorty['title'] ?></option>
                <?php endforeach ?>
            </select>

            <label for="image" class="lables">Chose post photo</label>
            <input type="file" name="image" required>

            <br><br>
            <button type="submit" name="save_post" class="send_btn">Save</button>
        </form>

    </div>
</main>
</body>
