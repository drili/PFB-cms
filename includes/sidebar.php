<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>

        <!-- Creating a form to search from our database -->
        <form action="search.php" method="post">

            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>

        </form> <!-- Search form end -->
        <!-- /.input-group -->
    </div>

    <!-- Login -->
    <div class="well">
        <?php
            if (isset($_SESSION['user_role'])) {
                $username = $_SESSION['username'];

                echo "<h4>Logged in as $username</h4>";
                echo "<a href='includes/logout.php'><button class='btn btn-primary'>Logout</button></a>";
            } else {
        ?>
            <h4>Login</h4>
            <!-- Creating a form to search from our database -->
            <form action="includes/login.php" method="post">

                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter username">
                </div>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter password">
                    <span class="input-group-btn">
                        <button type="submit" name="login" class="btn btn-primary">
                            Submit
                        </button>
                    </span>
                </div>

            </form> <!-- Search form end -->
            <!-- /.input-group -->

        <?php
        }
        ?>
    </div>


    <!-- Blog Categories Well -->
    <div class="well">

        <!-- Our sidebar categories widget query -->
        <?php
        /* -------------------------------------------------------------
        Connect data to our sidebar category query
        ------------------------------------------------------------- */
            $query = "SELECT * FROM categories";
            $select_catagories_sidebar = mysqli_query($connection, $query);

        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php
                    while ($row = mysqli_fetch_assoc($select_catagories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }

                    ?>
                </ul>
            </div> <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php
        // include "widget.php";
    ?>

</div>
