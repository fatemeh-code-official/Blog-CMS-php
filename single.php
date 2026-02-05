<?php
include "includes/header.php";

$name = '';
$email = '';
$message = '';
$successfulComment = '';

//recieving comment
if (isset($_POST['send_comment'])) {

    $postid = $_POST['postid'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $status = 0;

    if (!empty($name) && !empty($email) && !empty($message)) {
        $connection->query(
            "INSERT INTO comments (NAME, BODY, POST_ID, STATUS, USER_EMAIL, SUBJECT)
             VALUES ('$name', '$message', '$postid', '$status', '$email', '$subject')"
        );
        $successfulComment = 'Your comment has been recieved!';
    }
}


if (isset($_GET['postId'])) {
    $postId = $_GET['postId'];

    $post = $connection->query(
        "SELECT * FROM posts WHERE id=$postId"
    )->fetch();

    $categoryId = $post['category_id'];

    $category = $connection->query(
        "SELECT * FROM categories WHERE id=$categoryId"
    )->fetch();
}

$categories = $connection->query("SELECT * FROM categories");
?>

<link rel="stylesheet" href="statics/styles/blog_home.css">
<link rel="stylesheet" href="statics/styles/blog_single.css">

<!-- Main content -->
<main class="single_main_content">

    <!-- Post Area -->
    <section class="single_post_area d-flex column-flex">

        <!-- Post Photo -->
        <img src="statics/images/Blog/<?php echo $post['image']; ?>" alt="post-photo" class="post_pic">

        <!-- Post Content -->
        <section class="single_post_content d-flex">

            <!-- Post Info -->
            <div class="post_info d-flex column-flex" style="align-items: baseline;margin-top:1rem;">

                <!-- Post Categories -->
                <div class="post_categories d-flex column-flex">
                    <a href="blog_home.php?categoryId=<?= $category['id'] ?>">
                        <?= $category['title']; ?>
                    </a>
                </div>

                <!-- Post Author -->
                <a href="#" class="post_author d-flex flex-end post-info-item">
                    <p><?= $post['author']; ?></p>
                    <i class="fa-regular fa-user"></i>
                </a>

                <!-- Post Published date -->
                <div class="post_published_date d-flex align-items-center flex-end post-info-item">
                    <p><?= date('Y', strtotime($post['published_date'])) ?></p>
                    <i class="fa-regular fa-calendar-days"></i>
                </div>

                <!-- Counted Views -->
                <div class="post_views d-flex flex-end post-info-item">
                    <p><?= $post['counted_views']; ?> Views</p>
                    <i class="fa-regular fa-eye"></i>
                </div>

            </div>
            <!-- End of Post Info -->

            <section class="post_contents d-flex column-flex">
                <h1 class="title"><?= $post['title']; ?></h1>
                <p class="content">
                    <?= $post['content']; ?>
                </p>
            </section>

        </section>

        <!-- Comments -->

        <!-- Counted comments -->
        <section class="comment_count d-flex column-flex">
            <?php
            $comments = $connection->query("SELECT * FROM comments WHERE post_id='$postId' AND status=1");
            ?>
            <h5 class="c_title">Comments :
                <?php
                if ($comments->rowCount() > 0) {
                    echo $comments->rowCount();
                } else {
                    echo "There is no comment yet!";
                }
                ?>
            </h5>

            <!-- User shown Comments -->
            <?php
            foreach ($comments as $comment): ?>
                <div class="single_comment d-flex column-flex">
                    <div class="top d-flex justify-content-space-between align-items-center">
                        <div class="pic d-flex align-items-center">
                            <img src="statics/images/user.jpg">
                            <p style="margin-left: 1rem;"><?= $comment['name'] ?></p>
                        </div>
                        <p style="color:#e7a6b5!important;font-size:13px;"><?= $comment['created_date']; ?></p>
                    </div>

                    <p><?= $comment['body'] ?></p>
                </div>
            <?php endforeach ?>
        </section>

        <section class="comments d-flex column-flex">
            <!-- Comment form -->
            <h3 class="comment_title">Leave a comment</h3>

            <form action="single.php?postId=<?= $postId ?>" method="post" class="comments_form">
                <input type="text" name="name" required placeholder="Enter Name" class="comment_inputs" id="name">
                <input type="text" name="subject" placeholder="Enter Subject" class="comment_inputs" id="subject">
                <input type="email" name="email" required placeholder="Enter Email" class="comment_inputs" id="email">
                <textarea name="message" placeholder="Message" rows="5" id="message"></textarea>

                <input type="hidden" name="postid" value="<?= $postId ?>">

                <button type="submit" name="send_comment" id="send">Post comment</button>
                <br> <br>

                <?php if (!empty($successfulComment)): ?>
                    <div class="alert_success"><?= $successfulComment ?></div>
                <?php endif; ?>
            </form>
        </section>

    </section>

    <!-- Widget Bar -->
    <div class="widget-bar d-flex column-flex align-items-center">

        <div class="search_box" id="slider_search_box">
            <form action="#" method="post">
                <input type="text" name="keyword" placeholder="Search...">
                <button class="position-absolute" name="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <?php include 'includes/blog_writer.php'; ?>
        <?php include 'includes/latestposts.php'; ?>

        <!-- Post Categories -->
        <section class="posts-categories d-flex column-flex">
            <h4 class="widget-bar-title">Posts categories</h4>
            <ul class="categories d-flex column-flex">
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="blog_home.php?categoryId=<?= $category['id']; ?>"
                            class="d-flex justify-content-space-between">
                            <p><?= $category['title']; ?></p>
                            <p><?= countCategory($category['id']); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

    </div>

</main>

<?php include "includes/footer.php"; ?>