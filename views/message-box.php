
    <div class="blog-box">
        <div class="message-text-box" id="<?= $GLOBALS['post_id']?>">
            <?php 
                include("upvote_downvote.php");
                if (isset($_SESSION['userid'])) {
                    if ($GLOBALS['name'] === $post_name) {
                        echo '<form action="home.php" method="post">';
                        echo '<button type="submit" name="delete-button-' . $GLOBALS['post_id'] . '" class="upvote-downvote delete"><img src="../img/delete.png" alt="upvote icon"></button>';
                        echo '</form>';
                    }
                    //delete posts
                    if (isset($_POST['delete-button-' . $GLOBALS['post_id']])) {
                        $delete_post = $pdo->prepare("DELETE FROM `posts` WHERE id = :id");
                        $delete_post->execute([':id' => $GLOBALS['post_id']]);
                        header('Location: home.php');
                    }
                }
                
            ?>
            <p class="message-name"><?= htmlspecialchars($post_name) ?></p>
            <p class="date"><?= htmlspecialchars($date)?></p>
            <p class="message"><?= htmlspecialchars($message) ?></p>
            <img src="<?= htmlspecialchars($url)?>" alt="<?= htmlspecialchars($url)?>">
            
            <div class="add-comment">
                <form action="home.php" method="post">
                    <input type="text" name="comment" class="comment-input" placeholder="Add Comment..." submit=""><br>
                    <input type="submit" value="Add Comment" class="post-button" name="submit-comment-box-<?= $GLOBALS['post_id']?>">
                </form>

            </div>
            <form action="home.php" method="post">
                <div class="comments">
                <?php
                    if (isset($_POST['submit-comment-box-' . $GLOBALS['post_id']])) {
                        validateComment($comment_name, $comment);
                        if (isCommentCorrect($comment) === true) {
                            $insert_comment = $pdo->prepare("INSERT INTO `comments` (fk_id_post, created_by, created_at, comment_text) VALUES ((SELECT id FROM posts WHERE id = :id_post), :created_by, :created_at, :comment_text)");
                            $insert_comment->execute([':id_post' => $GLOBALS['post_id'], ':created_by' => $GLOBALS['name'], ':created_at' => $date, ':comment_text' => $comment]);

                        }
                    }
                    $load_comments = $pdo->prepare("SELECT * FROM `comments` WHERE fk_id_post = :id_post ORDER BY created_at DESC");
                    $load_comments->execute([':id_post' => $GLOBALS['post_id']]);
                    foreach ($load_comments->fetchAll() as $load_comment) {
                        var_dump($load_comment);
                    }
                ?>
                </div>
            </form>

        </div>
    </div>
    <?php $image = '';?>