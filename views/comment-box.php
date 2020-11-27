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
    ?></p>
        <p class="comment-date"><?= htmlspecialchars($commentdate)?></p>
        <p class="comment-message"><?= htmlspecialchars($commentmessage)?></p>

</div>