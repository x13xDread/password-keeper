<?php include "../layouts/_document_head.php"?>
<?php include "../scripts/session_handler.php"?>
<?php include "../layouts/_navbar.php" ?>
<div class="container">
    <!--where the table display is going to go-->
    <p class="text-success text-center mt-2"><?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></p>
    <div class="container border w-50 text-center mt-5 p-2 bg-light">
        <h1>Password Keeper</h1>
        <h3>Welcome <?php echo $_SESSION['username']?></h3>
        
    </div>
</div>