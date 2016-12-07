<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Join Us - Midnight Delivery</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <div class="container" style="margin-top: 80px;">
            <h1>Join us Today!!!</h1>
            <form action="action_page.php">
                <fieldset>
                    <fieldset>
                        <legend>Personal information:</legend>
                        First name:
                        <input type="text" name="firstname">
                        <br>
                        <br>
                        Middle name:
                        <input type="text" name="middlename">
                        <br>
                        <br>
                        Last name:
                        <input type="text" name="lastname">
                        <br>
                        <br>
                        Preferred Pronoun:
                        <input type="text" name="pronoun">
                        <br>
                        <br>
                        Email:
                        <input type="text" name="email">
                        <br>
                        <br>
                        Phone Number:
                        <input type="text" name="phone">
                        <br>
                        <br>
                        Upload your resume:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <br>
                        <br>
                        Which campus do you live in at UVM? You can refer to this <a href="https://reslife.uvm.edu/halls" target="_blank">link</a>.
                        <br>
                        <input list="campus" name="campus">
                        <datalist id="campus">
                            <option value="Athletic Campus">
                            <option value="Central Campus">
                            <option value="North Campus">
                            <option value="Other Locations">
                            <option value="Redstone Campus">
                            <option value="Not living on Campus">
                        </datalist>
                        <br>
                        <br>
                    </fieldset>
                    <fieldset>
                        <legend>Questions:</legend>
                        Which type of job do you want to work on?
                        <br>
                        <input list="job" name="job">
                        <datalist id="job">
                            <option value="Front End">
                            <option value="Back End">     
                        </datalist>
                        <br>
                        <br>
                        How did you know about us?
                        <br>
                        <input type="text" name="knowabout">
                        <br>
                        <br>
                        Any comment(s):
                        <br>
                        <textarea name="comment" rows="5" cols="30"></textarea>
                        <br>
                        <br>
                        <br>
                    </fieldset>
                    <input type="submit" value=" Submit my application ">
                </fieldset>
            </form>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
