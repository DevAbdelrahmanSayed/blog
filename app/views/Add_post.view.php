<?php
session_start();
include_once(PARTIALS.'header.php');
?>
<body>
<?php
include_once(PARTIALS.'nav.php');
?>
    <!--====================== END OF NAV ====================-->


<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <div class="alert__message error">
            <p>This is an error message</p>
        </div>
        <form action="post_create" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title">
          
            <select name="category">
            <?php foreach($categories AS $cat): ?>
                <option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['name'];  ?></option>
                <?php  endforeach;?>
            </select>
            <textarea rows="10" name="body" placeholder="Body"></textarea>
          
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="post_img" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>
    </div>
</section>
<script src="<?php echo LINK  ?>main.js"></script>

</body>
</html>