<?php
include_once(PARTIALS.'header.php');

?>

<body>
<?php
include_once(PARTIALS.'nav.php');
?>
    <!--====================== END OF NAV ====================-->

    <section class="featured">
    <div class="container featured__container">
        <?php if (!empty($latestPost)): ?>
            <div class="post__thumbnail">
                <img src="<?php echo PHOTO . $latestPost['post_img']; ?>" alt="Post Image">
            </div>
       
            <div class="post__info">
                <a href="#" class="category__button">
                    <?php echo htmlspecialchars($latestPost['username']); ?>
                </a>
                <h2 class="post__title">
                    <a href="<?php echo LINK ?>Post/read_post/?posts_id=<?php echo $latestPost['posts_id']; ?>">
                        <?php echo htmlspecialchars($latestPost['title']); ?>
                    </a>
                </h2>
                <p class="post__body">
                    <?php
                    $body = $latestPost['body'];
                    $maxLength = 200;
                    echo (strlen($body) > $maxLength) ? substr($body, 0, $maxLength) . '... <a href="' . LINK . 'Post/read_post/?posts_id=' . $latestPost['posts_id'] . '">Read More</a>' : $body;
                    ?>
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="<?php echo PHOTO . $latestPost['profile']; ?>" alt="Author Avatar">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?php echo htmlspecialchars($latestPost['username']); ?></h5>
                        <small><?php echo $latestPost['created_at']; ?></small>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="no-posts">
                <h2>No posts available at the moment.</h2>
            </div>
        <?php endif; ?>
    </div>
</section>

    <!--====================== END OF FEATURED ====================-->
    <section class="posts">
    <div class="container posts__container">
    <?php foreach ($posts as $post): ?>

        
        <article class="post">
      
            <div class="post__thumbnail">
            <img src="<?php echo  PHOTO. $post['post_img']; ?>">
            </div>
            <div class="post__info">
                <a class="category__button"><?php echo $post['username']; ?></a>
                <h3 class="post__title">
                    <a href="<?php echo LINK ?>Post/read_post/?posts_id=<?php echo $post['posts_id']; ?>"><?php echo $post['title']; ?></a>
                </h3>
                <p class="post__body">
                    <?php
                    $body = $post['body'];
                    $maxLength = 200; // Maximum length of the displayed body text
                    if (strlen($body) > $maxLength) {
                        $trimmedBody = substr($body, 0, $maxLength);
                        echo $trimmedBody . '... ';
                        echo '<a href="' . LINK . 'Post/read_post/?posts_id=' . $post['posts_id'] . '">Read More</a>';
                    } else {
                        echo $body;
                    }
                    ?>
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="<?php echo  PHOTO. $post['profile']; ?> ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?php echo $post['username']; ?></h5>
                        <small><?php echo $post['created_at']; ?></small>
                    </div>
                </div>
            </div>
            
        </article>
        <?php endforeach; ?>
    </div>
</section>

    <!--====================== END OF POSTS ====================-->
    
<section class="category__buttons">
        <div class="container category__buttons-container">
        <?php foreach($categories AS $categ): ?>
            <a href="<?php echo LINK ?>Home/Categories/?cat_id=<?php echo $categ['cat_id']; ?>" class="category__button"><?php echo $categ['name']; ?></a>
    
            <?php endforeach;?>
        </div>
        
    </section>

<?php
include_once(PARTIALS.'footer.php');
?>

</body>
</html>