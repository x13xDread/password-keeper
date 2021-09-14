<?php include "../layouts/_document_head.php"?>
<?php include "../scripts/session_handler.php"?>
<?php include "../layouts/_navbar.php" ?>

<div class="container mt-3">
    <!--add pasword form-->
    <p class="text-success"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></p>
    <p class="text-danger"><?php if(isset($_GET['errormsg'])){ echo $_GET['errormsg']; } ?></p>
    <form action="../scripts/add_password.php" method="post">
        <!--account name-->
        <div class="form-group">
            <label for="account_name">Account Name</label>
            <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Enter account name">
        </div><br>
        <!--username input-->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div><br>
        <!--password input-->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div><br>
        <!--submit button-->
        <button type="submit" class="btn btn-primary">Add Password</button>
    </form>        

</div>