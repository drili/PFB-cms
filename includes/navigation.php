<?php ob_start(); ?>
<?php session_start(); ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/PFB-cms/index">Drilon CMS</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <!-- Our header-menu query -->
                <?php
                /* -------------------------------------------------------------
                Connecting our header to our categories table query
                ------------------------------------------------------------- */
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        $category_class = '';
                        $registration_class = '';
                        $contact_class = '';

                        $page_registration = 'registration.php';
                        $page_contact = 'contact.php';

                        $page_name = basename($_SERVER['PHP_SELF']);

                        if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                            $category_class = 'active';
                        } else if ($page_name == $page_registration) {
                            $registration_class = 'active';
                        } else if ($page_name == $page_contact) {
                            $contact_class = 'active';
                        }

                        // echo "<li class='$category_class'><a href='/PFB-cms/category.php?category={$cat_id}'>{$cat_title}</a></li>";
                        echo "<li class='$category_class'><a href='/PFB-cms/category/{$cat_id}'>{$cat_title}</a></li>"; // Pretty links
                    }
                ?>

                <li>
                    <a href="/PFB-cms/admin/index.php">Admin</a>
                </li>

                <li class="<?php echo $contact_class ?>">
                    <a href="/PFB-cms/contact.php">Contact</a>
                </li>

                <li class="<?php echo $registration_class ?>">
                    <a href="/PFB-cms/registration.php">Registration</a>
                </li>

                <?php
                    if (isset($_SESSION['user_role'])) {

                        if (isset($_GET['p_id'])) {

                            $the_post_id = $_GET['p_id'];

                            echo "<li><a href='/PFB-cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                        }
                    }
                ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
