
    <div class="blog-box">
        <div class="message-text-box" id="<?= $GLOBALS['post_id']?>">
            <?php 
                $own_post = '';
                if (isset($_SESSION['userid'])) {
                    include("upvote_downvote.php");
                    if ($GLOBALS['name'] === $post_name) {
                        $own_post = 'own_post"';
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
            <p class="message-name <?= $own_post?>"><?= htmlspecialchars($post_name) ?></p>
            <p class="date"><?= htmlspecialchars($date)?></p>
            <p class="message"><?= htmlspecialchars($message) ?></p>
            <img src="<?= htmlspecialchars($url)?>" alt="<?= htmlspecialchars($url)?>">
            
            <div class="add-comment">
                <form action="home.php" method="post">
                    <input type="text" name="comment" class="comment-input" placeholder="Enter Comment here..." submit=""><br>
                    <input type="submit" value="Add Comment" class="post-button comment-button" name="submit-comment-box-<?= $GLOBALS['post_id']?>">
                </form>

            </div>
            <form action="home.php" method="post">
                <div class="comments">
                <?php
                    if (isset($_POST['submit-comment-box-' . $GLOBALS['post_id']]) && isset($_SESSION['userid'])) {
                        validateComment($comment_name, $comment);
                        if (isCommentCorrect($comment) === true) {
                            $insert_comment = $pdo->prepare("INSERT INTO `comments` (fk_id_post, created_by, comment_text) VALUES ((SELECT id FROM posts WHERE id = :id_post), :created_by, :comment_text)");
                            $insert_comment->execute([':id_post' => $GLOBALS['post_id'], ':created_by' => $GLOBALS['name'], ':comment_text' => $comment]);

                        }
                    } else if (isset($_POST['submit-comment-box-' . $GLOBALS['post_id']]) && !isset($_SESSION['userid'])){
                        echo '<div class=error-box><ul>';
                            echo '<li class="error">Please Login to Comment!</li>';
                        echo '</ul></div>';
                    }
                    
                    $load_comments = $pdo->prepare("SELECT * FROM `comments` WHERE fk_id_post = :id_post ORDER BY created_at DESC");
                    $load_comments->execute([':id_post' => $GLOBALS['post_id']]);
                    foreach ($load_comments->fetchAll() as $load_comment) {
                        $commentname = $load_comment[2];
                        $commentdate = $load_comment[3];
                        $commentmessage = $load_comment[4];                        
                        include("comment-box.php");
                        
                    }
                    

                ?>
                </div>
            </form>

        </div>
    </div>
    <?php $image = '';?>