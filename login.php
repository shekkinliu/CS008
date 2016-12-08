<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - Midnight Delivery</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <div class="container" style="margin-top: 80px;">
            <center><h1 class="welcomestyle">Welcome back<br> Our beloved customer</h1></center>
            <br>
            <br>
            <form action="action_page.php">
                <fieldset id="login">
                    <legend>Login:</legend>
                    <label for="username">Username:</label>
                    <input id="username"
                           type="text"
                           name="username"
                           >
                    <label for="password">Password:</label>
                    <input id="password"
                           type="password"
                           name="password"
                           >
                    
                </fieldset>
            </form>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
