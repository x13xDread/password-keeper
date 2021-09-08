<?php include "../layouts/_document_head.php"?>
<?php include "../scripts/session_handler.php"?>
<div class="container">
    <!--where the table display is going to go-->
    <div class="container border w-50 text-center mt-5 p-2 bg-light">
        <h1>Password Keeper</h1>
        <h5>Passwords</h5>
        <!--logout button-->
        <form action="../scripts/logout_handler.php" method="post">
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
</div>