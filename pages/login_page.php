<?php include "../layouts/_document_head.php" ?>
<body>
    <h1 class="text-center"> Password Keeper</h1>
    <div class="container text-center w-25 border bg-light">
        <h5>Log In</h5>
        <form action="../scripts/login_handler.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div><br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div><br>
            <p class="text-danger">
                <?php if($_SERVER["REQUEST_METHOD"] == "GET")
                {
                    echo $_GET["msg"];
                } ?>
            </p>
            <button type="submit" class="btn btn-primary">Submit</button><br><br>
        </form>
    </div>
</body>
</html>