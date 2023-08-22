<?php
session_start();
include_once(PARTIALS.'header.php');
?>
<body>
<?php
include_once(PARTIALS.'nav.php');
?>
<!--====================== END OF NAV ====================-->

<?php foreach($id_Post as $update_post): ?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <div class="alert__message error">
            <p>This is an error message</p>
        </div>
        <form action="update_post?upd_id=<?php echo  $update_post['posts_id']; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" value="<?php echo $update_post['title'] ?>" placeholder="Title">
            <select name="category">
                <option value="1">PHP</option>
                <option value="1">MySql</option>
                <option value="1">Html</option>
                <option value="1">Css</option>
                <option value="1">JavaScript</option>
                <option value="1">Problem Solving</option>
            </select>
            <textarea rows="10" name="body"  placeholder="Body"><?php echo $update_post['body'] ?></textarea>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="post_img" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update</button>
        </form>
    </div>
</section>
<?php endforeach; ?>

<script src="<?php echo LINK  ?>main.js"></script>
</body>
</html>
