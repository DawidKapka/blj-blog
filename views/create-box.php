<?php
$upvotes = 0;
$downvotes = 0;
?>

<p class="header-text"><img src="../img/create-icon.png" alt="" class="icon"> Create Post:</p>
<?php $name= $GLOBALS['name'][1];?>

<textarea name="blog-input" cols="100" rows="5" class="blog-input" value="<?php?>"><?= $message?></textarea><br>

<div class="img-box">
    <label for="img" class="image-input">Image: </label>
    <input type="text" name="img" id="img" class="image-input" placeholder="Paste URL here..."><br>
</div>
<input type="submit" value="Send" class="post-button" name="login-box">