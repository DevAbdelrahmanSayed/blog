<?php
session_start();
include_once(PARTIALS . 'header.php');
?>

<body>
    <?php include_once(PARTIALS . 'nav.php'); ?>
   
    

    <?php foreach ($post_id as $posts_id): ?>
        <section class="singlepost">
            
            <div class="container singlepost__container">
                
                <h2><?php echo $posts_id['title']; ?></h2>
                <div class="post__author">
                    <div class="post__author-avatar">
                    <img src="<?php echo  PHOTO. $posts_id['post_img']; ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?php echo $posts_id['username']; ?></h5>
                        <small><?php echo $posts_id['created_at']; ?></small>
                    </div>
                </div>
                <div class="singlepost__thumbnail">
                <img src="<?php echo  PHOTO. $posts_id['post_img']; ?>">
                </div>
                <p>
                    <?php echo $posts_id['body']; ?>
                </p>
                    <br>
                   
                    <div style="display: flex; justify-content: space-between;">
                  <?php  if(isset($_SESSION['user_id'])AND $_SESSION['user_id']== $posts_id['user_id'] ): ?>
                      
                    <a href="<?php echo LINK ?>Post/update_post/?upd_id=<?php echo $posts_id['posts_id']; ?>" class="btn">Update</a>
                    <a href="<?php echo LINK ?>Post/delete_Post/?del_id=<?php echo $posts_id['posts_id']; ?>" class="btn">Delete</a>
                    <?php endif;?>
        </div>
            </div>
            
        </section>
    <?php endforeach; ?>

    <?php include_once(PARTIALS . 'footer.php'); ?>
</body>
</html>
