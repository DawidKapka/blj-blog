<div class="comment-box">
    <p class="comment-name"><?php  
        $admin_post_comment = '';
        if($commentname === 'Dawid Kapka') {
            $admin_post_comment = "admin_post_comment";
        }
        echo '<p class="' . $admin_post_comment . '">' . htmlspecialchars($commentname);
        if($commentname === 'Dawid Kapka') {
            echo '<img class="admin" src="../img/admin.png" alt="admin icon">';
        }
        echo '</p>';
        if ($commentname === $GLOBALS['name']) {
            echo '<form action="home.php" method="post">';
            echo '<button type="submit" name="delete-comment-button-' . $commentid . '" class="upvote-downvote delete delete-comment"><img src="../img/delete.png" alt="upvote icon"></button>';
            echo '</form>';
        }
        if (isset($_POST['delete-comment-button-' . $commentid])) { // delete comments
            $delete_post = $pdo->prepare("DELETE FROM `comments` WHERE id_comment = :id");
            $delete_post->execute([':id' => $commentid]);
        }
    ?></p>
        <p class="comment-date"><?= htmlspecialchars($commentdate)?></p>
        <p class="comment-message"><?= htmlspecialchars($commentmessage)?></p>

</div>