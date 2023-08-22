
<?php 
include_once(PARTIALS . 'header.php');
?>
<body>
    <section class="form__section">
        <div class="container form__section-container">
            <h2>verification code</h2>
            <?php if (!empty($errors)): ?>
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
            <?php endif; ?>
            <form action="verify" method="POST">
                <input type="text" name="verification_code" placeholder="Enter verification_code" required>
                <button type="submit" name="verify" class="btn">Verify</button>
             
            </form>
        </div>
    </section>
</body>
</html>

    <!--====================== END OF NAV ====================-->
    