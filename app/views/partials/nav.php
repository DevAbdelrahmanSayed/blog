<nav>
    <div class="container nav__container">
        <a href="<?php echo LINK ?>home/index" class="nav__logo">Cipher</a>
        <ul class="nav__items">
            
            <?php if(empty($_SESSION['username'])): ?>
                <li><a href="<?php echo LINK ?>User_Login/login">Login</a></li>
            <?php elseif(!empty($_SESSION['username'])): ?>
                <li><a href="<?php echo LINK ?>home/blog">Blog</a></li>
                <li><a href="<?php echo LINK ?>Add_post/create_post">Add Post</a></li>
                <li><a href="<?php echo LINK ?>contact/contact">Contact</a></li>
                <li><a href="<?php echo LINK ?>about/about">About</a></li>
            <?php endif; ?>
            <?php if(!empty($_SESSION['username'])): ?>
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="<?php echo  PHOTO. $profile_photo['profile']; ?>">
                        <?php echo  PHOTO. $profile_photo['username'];?>
                    </div>
                    <ul>
                        <li><a href="<?php echo LINK ?>Admin/dashboard">Dashboard</a></li>
                        <li><a href="<?php echo LINK ?>User_Login/logout">Logout</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>

        <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
