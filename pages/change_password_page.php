<?php include "../layouts/_document_head.php"?>
<?php include "../scripts/session_handler.php"?>
<?php include "../layouts/_navbar.php" ?>

<div class="container mt-3 border">
    <h1 class="text-center">Change Password for <?php echo $_SESSION["username"] ?></h1>
    <!--create a form to change password-->
        <form action="../scripts/change_password_handler.php" method="post">
        <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter old password">
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Enter new password">
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm new password">
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>
    </form>
</div>
</div>