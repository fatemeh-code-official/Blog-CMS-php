<?php include "includes/header.php"; ?>

<link rel="stylesheet" href="statics/styles/blog_home.css">

<!-- Blog Title  -->
<div class="blog_title">
    <h1>Blog</h1>
</div>
<!-- End of Blog Title -->

<!-- Main Content -->
<main class="main_content d-flex">

    <!-- Posts Area -->
    <section class="posts_area d-flex column-flex align-items-center">

        <?php if ($posts->rowCount() >= 1): ?>

            <?php foreach ($posts as $post): ?>
                <!-- Single Post -->
                <article class="single_post d-flex">

                    <!-- Post Info -->
                    <div class="post_info d-flex column-flex justify-content-center">

                        <!-- Post Categories -->
                        <div class="post_categories d-flex column-flex flex-end">
                            <?php
                            $categoryId = $post['category_id'];
                            $category = $connection->query(
                                "SELECT * FROM categories WHERE id=$categoryId"
                            )->fetch();
                            ?>
                            <a href="blog_home.php?categoryId=<?= $category['id']?>">
                                <?= $category['title'] ?>
                            </a>
                        </div>

                        <!-- Post Author -->
                        <a href="#" class="post_author d-flex flex-end post-info-item">
                            <p><?= $post['author'] ?></p>
                            <i class="fa-regular fa-user"></i>
                        </a>

                        <!-- Post Published date -->
                        <div class="post_published_date d-flex align-items-center flex-end post-info-item">
                            <p><?= date('y/m/d',strtotime($post['published_date'])) ?></p>
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>

                        <!-- Counted Views -->
                        <div class="post_views d-flex flex-end post-info-item">
                            <p><?= $post['counted_views'] ?> Views</p>
                            <i class="fa-regular fa-eye"></i>
                        </div>

                    </div>
                    <!-- End of Post Info -->

                    <!-- Post Content -->
                    <div class="post-content d-flex column-flex">

                        <!-- Post image -->
                        <div class="post-image">
                            <img src="statics/images/Blog/<?= $post['image'] ?>" alt="horror">
                        </div>

                        <!-- Post Title -->
                        <div class="post-title">
                            <a href="single.php?postId=<?= $post['id'] ?>">
                                <h3><?= $post['title'] ?></h3>
                            </a>
                        </div>

                        <!-- Post description -->
                        <div class="post_description">
                            <p>
                                <?= substr($post['content'], 0, 255); ?>...
                            </p>
                        </div>

                        <!-- View More button -->
                        <div class="view_more">
                            <a href="single.php?postId=<?= $post['id'] ?>">View More</a>
                        </div>

                    </div>
                    <!-- End of Post Content -->

                </article>
                <!-- End of Single Post -->
            <?php endforeach; ?>

        <?php else: ?>

            <article class="single_post d-flex">
                <div style="font-size:1.3rem;color:#5c2a4a">
                    No Post refered to this category! 
                </div>
            </article>

        <?php endif; ?>

    </section>
    <!-- End of Post Area -->

    <!-- Widget Bar -->
    <div class="widget-bar d-flex column-flex align-items-center">

        <div class="search_box" id="slider_search_box">
            <form action="search.php" method="post">
                <input type="text" name="keyword" placeholder="Search...">
                <button class="position-absolute" name="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <?php include 'includes/blog_writer.php' ?>
        <?php include 'includes/latestposts.php' ?>

        <!-- Post Categories -->
        <section class="posts-categories d-flex column-flex">
            <h4 class="widget-bar-title">Posts categories</h4>
            <ul class="categories d-flex column-flex">
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="blog_home.php?categoryId=<?= $category['id'] ?>"
                            class="d-flex justify-content-space-between">
                            <p><?= $category['title'] ?></p>
                            <p><?= countCategory($category['id']) ?></p>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </section>
        <!-- End of Post Categories -->

    </div>
    <!-- End of Widget Bar -->
</main>

<!-- End of Main Content -->
<?php include 'includes/footer.php'; ?>