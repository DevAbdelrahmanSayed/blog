<?php
include_once(PARTIALS.'header.php');
?>
<body>
<?php
include_once(PARTIALS.'nav.php');
?>

    <!--====================== END OF NAV ====================-->


<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>
        <form action="">
            <input type="text" placeholder="Title">
            <textarea rows="4" placeholder="Description"></textarea>
            <button type="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>
<script src="<?php echo LINK  ?>main.js"></script>
</body>
</html>