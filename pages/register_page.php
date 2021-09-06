<?php include "../layouts/_document_head.php" ?>
<body>
    <h1 class="text-center"> Password Keeper</h1>
    <div class="container text-center w-25 border bg-light">
        <h5>Register</h5>
        <form action="../scripts/register_handler.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
            </div><br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div><br>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
            </div><br>
            <p class="text-danger">
            <?php 
                //if there is a msg in the get request, display it
                if(isset($_GET['msg'])){
                    echo $_GET['msg'];
                }
            ?>
            </p>
            <button type="submit" class="btn btn-primary">Register</button>&nbsp;<a href="../index.php"><button class="btn btn-secondary">Cancel</button></a><br><br>
    </div>
</body>
</html>