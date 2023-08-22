<?php
include_once(PARTIALS.'header.php');
?>
<body>
<?php
include_once(PARTIALS.'nav.php');
?>
    <!--====================== END OF NAV ====================-->





<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="<?php echo LINK ?>Admin/add_post"><i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK ?>Admin/dashboard"><i class="uil uil-postcard"></i>
                        <h5>Manage Posts</h5>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK ?>Admin/add_user"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK ?>Admin/manage_user" class="active"><i class="uil uil-users-alt"></i>
                        <h5>Manage User</h5>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK ?>Admin/add_category"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>
                <li>
                    <a href="<?php echo LINK ?>Admin/manage_categories"><i class="uil uil-list-ul"></i>
                        <h5>Manage Categories</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ernest Achiever</td>
                        <td>achiever</td>
                        <td><a href="<?php echo LINK ?>Admin/edit_user" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Daniel Vinyo</td>
                        <td>daniel</td>
                        <td><a href="<?php echo LINK ?>Admin/edit_user" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Jane Doe</td>
                        <td>jane</td>
                        <td><a href="<?php echo LINK ?>Admin/edit_user" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.html" class="btn sm danger">Delete</a></td>
                        <td>No</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>




<script src="<?php echo LINK  ?>main.js"></script>
</body>
</html>