
<!-- Hey, yo, Ro. Work on the followings requirements for the form. Thank! -->
<!-- Data should be validated for not missing, valid format etc as needed with php, appropriate error messages will be displayed. -->
<!-- Form should email the person who filled it out. -->
<!-- Form data should be saved to a csv file. Provide a link to this file on your main index. -->
<!-- Forms always need to provide feedback to the user so they know what happened after filling out the form. -->

<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>We are hiring - Midnight Delivery</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <div class="container" style="margin-top: 80px;">
            <h1>We are hiring</h1>
            <form action="action_page.php">
                <fieldset>
                    <fieldset>
                        <legend>Personal information:</legend>
                        First name:
                        <input type="text" 
                               name="firstname"
                               placeholder="Enter your first name">
                        <br>
                        <br>                   
                        Last name:
                        <input type="text" 
                               name="lastname"
                               placeholder="Enter your last name">
                        <br>
                        <br>
                        Preferred Pronoun:
                        <input type="text" name="pronoun">
                        <br>
                        <br>
                        Email:
                        <input type="email" name="email">
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
                        <input type="radio" name="job" value="frontend"> Front End.<br>
                        <input type="radio" name="job" value="backend"> Back End.<br>
                        <input type="radio" name="job" value="noend"> I don't want a job.
                        <br>
                        <br>
                        How did you know about us?
                        <input type="checkbox" name="knowabout" value="classmates">Classmates<br>
                        <input type="checkbox" name="knowabout" value="facebook">Facebook<br>
                        <input type="checkbox" name="knowabout" value="posters">Posters<br>
                        <input type="checkbox" name="knowabout" value="instagram">Instagram<br>
                        <input type="checkbox" name="knowabout" value="twitter">Twitter<br>
                        <input type="checkbox" name="knowabout" value="other">Other
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
