<nav>
    <div class="container nav__container">
        <a href="<?php echo LINK; ?>home" style="text-decoration: none;">
            <div class="nav__logo" style="display: flex; align-items: center; color: white;">
                <img src="<?php echo LINK; ?>front/images/logo.png" alt="Logo" style="margin-right: 10px; width: 50px; height: auto;">
                Blogify
            </div>
        </a>

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
                        <img src="<?php echo PHOTO . ($_SESSION['profile'] ); ?>" alt="Profile Photo">
                    </div>
                    <ul>
                        <li><a href="<?php echo LINK ?>Admin/dashboard"><i class="uil uil-dashboard"></i>Dashboard</a></li>
                        <li><a href="<?php echo LINK ?>User_Login/logout"><i class="uil uil-signout"></i>Logout</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>

        <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
