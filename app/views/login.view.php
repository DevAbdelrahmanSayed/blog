<?php include_once(PARTIALS . 'header.php'); ?>

<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign In</h2>
            <?php if (!empty($errors)): ?>
                <div class="alert__message error">
                    <?php
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                    ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo LINK ?>User_Login/post_login" method="POST">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login" class="btn">Sign In</button>
            </form>
            <div class="form__links">
                <small>Don't have an account? <a href="<?php echo LINK ?>Registration/signup">Sign Up</a></small>
                <small>Forgot your password? <a href="<?php echo LINK ?>ResetPassword/reset">Reset Password</a></small>
            </div>
        </div>
    </section>
</body>
</html>
