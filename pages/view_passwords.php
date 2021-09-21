<?php include "../layouts/_document_head.php"?>
<?php include "../scripts/session_handler.php"?>
<?php include "../layouts/_navbar.php" ?>
<?php include "../scripts/view_passwords.php" ?>


<!--page container-->
<div class="container">
    <!--page content-->
    <div class="container mt-3 bg-light border p-3">
        <h1 class = "text-center">Accounts for <?php echo " " . $_SESSION['username']; ?></h1>
        <!--data table-->
        
        <table id="accountsTable">
            <thead>
                <tr>
                    <th>Website</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Website</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        //create accounts data table
        $('#accountsTable').DataTable( {
            data: <?php echo $json; ?>,
            columns: [
                { "data": "account_name" },
                { "data": "username" },
                { "data": "password" }
            ],
            order: [0, 'account_name']
        } );
    } );
</script>