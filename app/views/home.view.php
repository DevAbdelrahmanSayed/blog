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
            <div class="post__thumbnail">
                <img src="./images/blog1.jpg">
            </div>
       
            <div class="post__info">
                <a href="home/details" class="category__button"></a>
                <h2 class="post__title"><a href="home/details">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid!</a></h2>
                <p class="post__body">
                    <?php echo $_SESSION['username'];?>
                </p>
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="./images/avatar2.jpg">
                    </div>
                    <div class="post__author-info">
                        <h5>By: 
                            <?php echo $_SESSION['username']; ?></h5>
                        <small>June 10, 2022 - 07:23</small>
                    </div>
                </div>
            </div>

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
                        <img src="<?php echo  PHOTO. $post['post_img']; ?> ?>">
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