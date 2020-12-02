
    <div class="blog-box">
        <div class="message-text-box" id="<?= $GLOBALS['post_id']?>">
            <?php 
                $own_post = '';
                $admin_post = '';
                if (isset($_SESSION['userid'])) {
                    include("upvote_downvote.php");
                    if ($GLOBALS['name'] === $post_name) {
                        $own_post = 'own_post"';
                        echo '<form action="home.php" method="post">';
                        echo '<button type="submit" name="delete-button-' . $GLOBALS['post_id'] . '" class="upvote-downvote delete"><img src="../img/delete.png" alt="delete icon"></button>';
                        echo '</form>';
                        echo '<form action="home.php" method="post">';
                        echo '<button type="submit" name="edit-button-' . $GLOBALS['post_id'] . '" class="upvote-downvote delete"><img src="../img/edit.png" alt="edit icon"></button>';
                        echo '</form>';
                    } else if ($GLOBALS['name'] === 'Dawid Kapka') {
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
                if ($post_name === 'Dawid Kapka') {
                    $admin_post = 'admin_post';
                }
                
            ?>

            <p class="message-name <?= $own_post?> <?= $admin_post?>">
            <?php 
            echo htmlspecialchars($post_name);
            if($post_name === 'Dawid Kapka') {
                    echo '<img class="admin" title="Administrator" src="../img/admin.png" alt="admin icon">';
                }
            ?></p>

            <p class="date"><?= htmlspecialchars($date)?></p>
            <?php
            $message = htmlspecialchars($message);

            if (!isset($_POST['edit-button-' . $GLOBALS['post_id']])) {
                echo '<p class="message">' . $message . '</p>';
            }
            else { //edit post
                echo '<form action="home.php" method="post">';
                echo '<textarea name="new-input" cols="100" rows="5" class="blog-input">' . $message . '</textarea><br>';
                echo '<button type="submit" name="save-button-' . $GLOBALS['post_id'] . '" class="post-button">Save</button>';
                echo '</form>'; 
            }
            if (isset($_POST['save-button-' . $GLOBALS['post_id']])) { 
                $change_post = $pdo->prepare("UPDATE posts SET post_message = :new_message WHERE id = :id_post");
                $change_post->execute([':id_post' => $GLOBALS['post_id'], ':new_message' => $_POST['new-input']]);
                header("Location: home.php");
            }
            ?>


            <img class="post-image" src="<?= htmlspecialchars($url)?>" alt="<?= htmlspecialchars($url)?>">
            
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
                        if (isCommentCorrect($comment) === true) { //add comment
                            $insert_comment = $pdo->prepare("INSERT INTO `comments` (fk_id_post, created_by, comment_text) VALUES ((SELECT id FROM posts WHERE id = :id_post), :created_by, :comment_text)");
                            $insert_comment->execute([':id_post' => $GLOBALS['post_id'], ':created_by' => $GLOBALS['name'], ':comment_text' => $comment]);
                        }
                    } else if (isset($_POST['submit-comment-box-' . $GLOBALS['post_id']]) && !isset($_SESSION['userid'])){
                        echo '<div class=error-box><ul>';
                            echo '<li class="error">Please Login to Comment!</li>';
                        echo '</ul></div>';
                    }
                    
                    //load comments
                    $load_comments = $pdo->prepare("SELECT * FROM `comments` WHERE fk_id_post = :id_post ORDER BY created_at DESC");
                    $load_comments->execute([':id_post' => $GLOBALS['post_id']]);
                    foreach ($load_comments->fetchAll() as $load_comment) {
                        $commentname = $load_comment[2];
                        $commentdate = $load_comment[3];
                        $commentmessage = $load_comment[4]; 
                        $commentid = $load_comment[0];                       
                        include("comment-box.php");
                        
                    }
                    

                ?>
                </div>
            </form>

        </div>
    </div>
    <?php $image = '';?>