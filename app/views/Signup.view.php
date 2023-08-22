<?php 
include_once(PARTIALS . 'header.php');
?>
<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>
            <?php if (!empty($errors)):?>
            <div class="alert__message error">
                <?php
                // Check if there are any errors
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<p>$error</p>"; // Display each error message
                    }
                }
                ?>
            </div>
            <?php endif  ?>
            <form action="post_signup" enctype="multipart/form-data" method="POST">
            <input type="text" name="username" placeholder="Username" value="<?php echo $oldValues['username'] ?? ''; ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo $oldValues['email'] ?? ''; ?>">

                <input type="password" name="password" placeholder="Create Password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" id="avatar" name="profile">
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="<?php echo LINK ?>User_Login/login">Sign In</a></small>
            </form>
        </div>
    </section>
</body>
</html>