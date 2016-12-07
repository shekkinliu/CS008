<?php ?>
<!DOCTYPE html>
<html lang="en">
    <?php include "head.php"; ?>
    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <div class="container" style="margin-top: 80px;">
            <p>Join us Today!!!</p>
            <form action="action_page.php">
                <fieldset>
                    <legend>Personal information:</legend>
                    First name:<br>
                    <input type="text" name="firstname" value="Mickey">
                    <br>
                    Last name:<br>
                    <input type="text" name="lastname" value="Mouse">
                    <br><br>
                    <input type="submit" value="Submit">
                </fieldset>
            </form>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
