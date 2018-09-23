<?php include 'includes/admin_header.php' ?>

<!-- Displaying user data on profile.php -->
<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname= $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
        }
    }
?>

<!-- Updating user profile data -->
<?php
    if (isset($_GET['edit_user'])) {
        $the_user_id = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id = $the_user_id";
        $select_users_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname= $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
        }
    }

    if (isset($_POST['edit_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if (!empty($user_password)) {
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
            // $post_date = date('d-m-y');

            $query = "UPDATE users SET ";
            $query .="user_firstname = '{$user_firstname}', ";
            $query .="user_lastname = '{$user_lastname}', ";
            $query .="username = '{$username}', ";
            $query .="user_email = '{$user_email}', ";
            $query .="user_password = '{$hashed_password}' ";
            $query .="WHERE username = '{$username}' ";

            $edit_user_query = mysqli_query($connection, $query);

            confirmQuery($edit_user_query);
        }

    }
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile page |
                            <small>Author</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="post_author">Firstname</label>
                                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_status">Lastname</label>
                                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
                            </div>

                            <!-- <div class="form-group">
                                <label for="post_image">User Image</label>
                                <input type="file" name="image">
                            </div> -->

                            <div class="form-group">
                                <label for="post_tags">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_content">Email</label>
                                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_content">Password</label>
                                <input type="password" class="form-control" name="user_password" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'includes/admin_footer.php' ?>
