<?php include 'includes/admin_header.php' ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Admin Page
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                            <?php
                                insert_categories();
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title" value="">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <!-- Edit form here (admin/update_categories.php) -->
                            <?php
                                if (isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];

                                    include 'includes/update_categories.php';
                                }
                            ?>

                        </div>
                        <!-- add category form -->

                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    /* -------------------------------------------------------------
                                    Find All Categories Query
                                    ------------------------------------------------------------- */
                                        findAllCategories();
                                    ?>

                                    <?php
                                    /* -------------------------------------------------------------
                                    Deleting categories
                                    ------------------------------------------------------------- */
                                        deleteCategories();
                                    ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/admin_footer.php' ?>
