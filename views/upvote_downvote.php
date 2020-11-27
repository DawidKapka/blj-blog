<?php 
    $upvotes = 0;
    $downvotes = 0;
    $load_votes = $pdo->prepare("SELECT * FROM `votes`");
    $load_votes->execute();
    foreach ($load_votes->fetchAll() as $load_vote) {
        if ($load_vote[1] === $GLOBALS['post_id']) {
            if ($load_vote[3] == true) {
                $upvotes++;
            } else {
                $downvotes++;
            }
        }
        
    }
    $vote = true;
    $check_votes = $pdo->prepare("SELECT * FROM `votes`"); 
    $check_votes->execute();
    foreach($check_votes->fetchAll() as $check_vote) {
        if ($check_vote[1] === $GLOBALS['post_id']) {
            if($check_vote[2] === $_SESSION['userid']) {
                $vote = false;
            } else {
                $vote = true;
            }
        }
    }

?>

<form action="home.php" method="post">
    <div class="votes">
        <p class="upvote-amount"><button type="submit" name="upvote-<?= $GLOBALS['post_id']?>" class="upvote-downvote"><img src="../img/like.png" alt="upvote icon"></button><?= $upvotes?></p>
        <p class="downvote-amount"><button type="submit" name="downvote-<?= $GLOBALS['post_id']?>" class="upvote-downvote"><img src="../img/dislike.png" alt="upvote icon"></button><?= $downvotes?></p>
    </div>

</form>

<?php
    if ($vote === true) {
        if (isset($_POST['upvote-' . $GLOBALS['post_id']])) { //add upvote
            $insert_upvote = $pdo->prepare("INSERT INTO `votes` (fk_id_post, fk_id_user, up_down) VALUES ((SELECT id FROM posts WHERE id = :id_post), (SELECT id_user FROM users WHERE id_user = :id_user), 1)");
            $insert_upvote->execute([':id_post' => $GLOBALS['post_id'], ':id_user' => $_SESSION['userid']]);
        }
        if (isset($_POST['downvote-' . $GLOBALS['post_id']])) { //add downvote
            $insert_upvote = $pdo->prepare("INSERT INTO `votes` (fk_id_post, fk_id_user, up_down) VALUES ((SELECT id FROM posts WHERE id = :id_post), (SELECT id_user FROM users WHERE id_user = :id_user), 0)");
            $insert_upvote->execute([':id_post' => $GLOBALS['post_id'], ':id_user' => $_SESSION['userid']]);
        }
    }
    $upvotes = 0;
    $downvotes = 0;
?>
