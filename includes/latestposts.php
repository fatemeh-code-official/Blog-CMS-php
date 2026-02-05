<?php
$latest_posts = $connection->query(
    "SELECT * FROM posts ORDER BY id DESC LIMIT 3"
);
?>

<!-- Latest posts -->
<section class="latest-posts d-flex column-flex">
    <h4 class="widget-bar-title">Latest posts</h4>

    <div class="latest-p d-flex column-flex">
        <?php foreach ($latest_posts as $latest_post): ?>
            <div class="single-latest-post d-flex">
                <img src="statics/images/Blog/<?= $latest_post['image'] ?>" class="post-photo">

                <div class="post-details d-flex column-flex justify-content-center">
                    <p>
                        <a  style="color:#5c2a4a;" href="single.php?postId=<?= $latest_post['id'] ?>">
                            <?= substr($latest_post['title'], 0, 17) . '...' ?>
                        </a>
                    </p>

                    <p>
                        <?= date('Y m d', strtotime($latest_post['published_date'])) ?>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>
<!-- End of Latest posts -->