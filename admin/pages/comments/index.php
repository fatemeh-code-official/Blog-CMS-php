<?php include '../../includes/header.php';

// Loading comments
$committedComments = $connection->query("SELECT * FROM comments WHERE status=1");
$UncommittedComments = $connection->query("SELECT * FROM comments WHERE status=0");

// Accepting comment
if (isset($_GET['accepting'])) {
    $commentId = $_GET['accepting'];
    $connection->query("UPDATE comments SET status=1 WHERE id='$commentId'");
    header("Location: index.php");
    exit;
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

    .default_btn {
        display: inline-block;
        width: fit-content;
        padding: 0.5rem;
        border: 2px solid green;
        color: black;
    }

    .default_btn:hover {
        background-color: greenyellow;
        transition: var(--transition);
    }

    .delete_btn {
        display: inline-block;
        width: fit-content;
        padding: 0.5rem;
        border: 2px solid red;
        color: black;
    }
    .delete_btn:hover {
        background-color: red;
        transition: var(--transition);
        color: white;
    }
</style>

<link rel="stylesheet" href="../../assets/css/index.css">

<main class="d-flex column-flex">
    <?php include '../../includes/sidebar.php'; ?>

    <!-- Committed Comments -->
    <div class="dashboard" style="margin: 4rem 2rem 4rem 20rem;">

        <h2 class="d_title">Comments</h2>
        <p class="recent">Committed Comments</p>

        <table>
            <tr>
                <th>Row</th>
                <th>Subject</th>
                <th>User Name</th>
                <th>Created date</th>
                <th>Operation</th>
            </tr>

            <?php
            $row = 1;
            foreach ($committedComments as $comment): ?>
                <tr class="row_content">
                    <td><?= $row ?></td>
                    <td><?= $comment['subject'] ?></td>
                    <td><?= $comment['name'] ?></td>
                    <td><?= $comment['created_date'] ?></td>
                    <td>
                        <a href="show.php?show=<?= $comment['id'] ?>" class="default_btn">Show</a>
                        <a href="index.php?id=<?= $comment['id'] ?>&table=comments" class="delete_btn">Delete</a>
                    </td>
                </tr>
            <?php
                $row++;
            endforeach ?>
        </table>
    </div>

    <!-- Uncommitted Comments -->
    <div class="dashboard" style="margin: 4rem 2rem 4rem 20rem;">
        <p class="recent">Uncommitted Comments</p>

        <table>
            <tr>
                <th>Row</th>
                <th>Subject</th>
                <th>User Name</th>
                <th>Created date</th>
                <th>Operation</th>
            </tr>

            <?php
            $row = 1;
            foreach ($UncommittedComments as $comment): ?>
                <tr class="row_content">
                    <td><?= $row ?></td>
                    <td><?= $comment['subject'] ?></td>
                    <td><?= $comment['name'] ?></td>
                    <td><?= $comment['created_date'] ?></td>
                    <td>
                        <!-- FIXED Accepting -->
                        <a href="index.php?accepting=<?= $comment['id'] ?>" class="default_btn">
                            Accepting
                        </a>

                        <a href="index.php?id=<?= $comment['id'] ?>&table=comments" class="delete_btn ">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php
                $row++;
            endforeach ?>
        </table>
    </div>
</main>
</body>