<?php
session_start();
include_once(PARTIALS.'header.php');
?>
<body>
<?php
include_once(PARTIALS.'nav.php');
?>
    <!--====================== END OF NAV ====================-->
    <section class="singlepost">
        <div class="container singlepost__container">
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, dicta.</h2>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="./images/avatar2.jpg">
                </div>
                <div class="post__author-info">
                    <h5>By: Jane Doe</h5>
                    <small>June 10, 2022 - 07:23</small>
                </div>
            </div>
            <div class="singlepost__thumbnail">
                <img src="./images/blog33.jpg">
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. In aliquam harum aspernatur tenetur, veritatis eaque explicabo consequuntur hic odit veniam nisi quo neque deleniti similique. Sit sed iste, quo excepturi porro, blanditiis dicta amet, temporibus necessitatibus nihil doloremque eos fuga!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. In aliquam harum aspernatur tenetur, veritatis eaque explicabo consequuntur hic odit veniam nisi quo neque deleniti similique. Sit sed iste, quo excepturi porro, blanditiis dicta amet, temporibus necessitatibus nihil doloremque eos fuga!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, ullam veritatis labore qui voluptatum error expedita temporibus rem voluptate recusandae cupiditate soluta! Aperiam incidunt quos labore modi sequi tempora amet debitis porro architecto consequatur. Quod dolore beatae amet voluptas quia. Voluptatem modi iste minima laboriosam labore adipisci quod, inventore eaque culpa, reiciendis quo aut perferendis consequuntur sunt! Explicabo, maxime reprehenderit.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. In aliquam harum aspernatur tenetur, veritatis eaque explicabo consequuntur hic odit veniam nisi quo neque deleniti similique. Sit sed iste, quo excepturi porro, blanditiis dicta amet, temporibus necessitatibus nihil doloremque eos fuga!
            </p>
        </div>
    </section>
    <!--====================== END OF SINGLE POST ====================-->

<?php
include_once(PARTIALS.'category.php');


include_once(PARTIALS.'footer.php');
?>
</body>
</html>