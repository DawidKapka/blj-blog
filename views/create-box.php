<p class="header-text"><img src="../img/create-icon.png" alt="" class="icon"> Create Post:</p>
<label for="name" class="name-input">Name:</label>
<input type="text" name="name" class="name-input" value="<?= $name?>"><br>

<textarea name="blog-input" cols="100" rows="5" class="blog-input" value="<?php?>"><?= $message?></textarea><br>

<div class="img-box">
    <label for="img" class="image-input">Image: </label>
    <input type="text" name="img" class="image-input" placeholder="Paste URL here..."><br>
</div>
<input type="submit" value="Send" class="post-button" name="login-box">