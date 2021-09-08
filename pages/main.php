<?php include "../layouts/_document_head.php"?>
<?php include "../scripts/session_handler.php"?>
<h1>Password Keeper</h1>
<div class="container">
    <!--where the table display is going to go-->
    <div class="container border w-25 bg-light">
        <h5>Passwords</h5>
        <!--logout button-->
        <form action="../scripts/logout_handler.php" method="post">
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
</div>