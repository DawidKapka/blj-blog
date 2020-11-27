<div class="comment-box">
    <p class="comment-name"><?php  
        echo htmlspecialchars($commentname);
        if($commentname === 'Dawid Kapka') {
                echo '<img class="admin" src="../img/admin.png" alt="admin icon">';
            }
    ?></p>
        <p class="comment-date"><?= htmlspecialchars($commentdate)?></p>
        <p class="comment-message"><?= htmlspecialchars($commentmessage)?></p>

</div>