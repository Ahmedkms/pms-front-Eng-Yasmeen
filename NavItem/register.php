<?php
$title = "register_page";
include('../inc/header.php');
include('../inc/navbar.php');
if (session_status() == PHP_SESSION_NONE) session_start();

?>

<div class="container px-4 px-lg-5 mt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <h1>Register</h1>
            <form action="../handellers/handel_register.php" method="POST" class="form border my-2 p-3">

                <div class="mb-3">
                    <?php if (isset($_SESSION['errors'])) : ?>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="name">User Name</label>
                        <input type="text" name="username" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="useremail" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pass">Password</label>
                        <input type="password" name="userpassword" id="pass" class="form-control">
                    </div>

                    <div class="mb-3">
                        <p>Select Role</p>
                        <select name="role" id="type">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Register" class="btn btn-success">
                        <p>If you have an account, <a href="login.php">Login here</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include('../inc/footer.php'); ?>