<?php include '../../includes/header.php';

$showedComment = null;

if (isset($_GET['show'])) {
    $commentId = $_GET['show'];
    $showedComment = $connection->query("SELECT * FROM comments WHERE id='$commentId'")->fetch();
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

<main class="d-flex column-flex">
    <?php include '../../includes/sidebar.php'; ?>

    <!-- Committed Comments -->
    <div class="dashboard" style="margin: 4rem 2rem 4rem 20rem;">

        <h2 class="d_title">Show comment</h2>

        <table>
            <tr>
                <th>Subject</th>
                <th>Content</th>
                <th>User Name</th>
                <th>Created date</th>
                <th>Operation</th>
            </tr>

            <?php if ($showedComment): ?>
                <tr class="row_content">
                    <td><?= $showedComment['body'] ?></td>
                    <td><?= $showedComment['subject'] ?></td>
                    <td><?= $showedComment['name'] ?></td>
                    <td><?= $showedComment['created_date'] ?></td>
                    <td>
                        <a href="index.php?id=<?= $showedComment['id'] ?>&table=comments"
                            class="default_btn">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endif; ?>

        </table>
    </div>
</main>
</body>