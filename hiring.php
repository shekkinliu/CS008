
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
        <?php
        //// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// PATH SETUP
//
        $domain = "//";
        $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, "UTF-8");
        $domain .= $server;
        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
        $path_parts = pathinfo($phpSelf);
        if ($debug) {
            print "<p>Domain: " . $domain;
            print "<p>php Self: " . $phpSelf;
            print "<p>Path Parts<pre>";
            print_r($path_parts);
            print "</pre></p>";
        }
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// inlcude all libraries. 
// 
// Google the difference between require and include
//
        print "<!-- include libraries -->";
        require_once('lib/security.php');
        // notice this if statemtent only includes the functions if it is 
        // form page. A common mistake is to make a form and call the page
        // join.php which means you need to change it below (or delete the if)
        //if ($path_parts['filename'] == "form") {
        print "<!-- include form libraries -->";
        include "lib/validation-functions.php";
        //}
        print "<!-- finished including libraries -->";

        include "head.php";
        ?>
    </head>

    <!-- #############  BODY SECTION IS RIGHT HERE MATE #############-->
    <!-- #############  DON'T MISS OUT ##############################-->
    <!-- #############  IT'S RIGHT HERE #############################-->
    <!-- #############  YES YOU GOT IT NOW ##########################-->
    <?php
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// We print out the post array so that we can see our form is working.
// if ($debug){  // later you can uncomment the if statement
    print "<p>Post Array:</p><pre>";
    print_r($_POST);
    print "</pre>";
// }
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.

    $thisURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form

    $email = "XXXXX@uvm.edu";

    $job = "noend";

    $jobERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.


    $emailERROR = false;

////%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
    $errorMsg = array();

// array used to hold form values that will be written to a CSV file
    $dataRecord = array();
// have we mailed the information to the user?
    $mailed = false;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
    if (isset($_POST["btnSubmit"])) {

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
     // SECTION: 2a Security
        // 
        if (!securityCheck($thisURL)) {
            $msg = "<p>Sorry you cannot access this page. ";
            $msg.= "Security breach detected and reported.</p>";
            die($msg);
        }

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
     // SECTION: 2b Sanitize (clean) data 
        // remove any potential JavaScript or html code from users input on the
        // form. Note it is best to follow the same order as declared in section 1c.




        $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
        $dataRecord[] = $email;

        $job = htmlentities($_POST["radJob"], ENT_QUOTES, "UTF-8");
        $dataRecord[] = $job;

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
     // SECTION: 2c Validation
        //
     // Validation section. Check each value for possible errors, empty or
        // not what we expect. You will need an IF block for each element you will
        // check (see above section 1c and 1d). The if blocks should also be in the
        // order that the elements appear on your form so that the error messages
        // will be in the order they appear. errorMsg will be displayed on the form
        // see section 3b. The error flag ($emailERROR) will be used in section 3c.


        if ($job != "frontend" OR $job != "backend" OR $job != "backend") {
            $errorMsg[] = "Please choose a job";
            $jobERROR = true;
        }





        if ($email == "") {
            $errorMsg[] = "Please enter your email address";
            $emailERROR = true;
        } elseif (!verifyEmail($email)) {
            $errorMsg[] = "Your email address appears to be incorrect.";
            $emailERROR = true;
        }


        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
     // SECTION: 2d Process Form - Passed Validation
        //
     // Process for when the form passes validation (the errorMsg array is empty)
        //    
        if (!$errorMsg) {
            if ($debug)
                print "<p>Form is valid</p>";




            //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            //
         // SECTION: 2e Save Data
            //
         // This block saves the data to a CSV file. 
            $fileExt = ".csv";
            $myFileName = "data/registeration"; // NOTE YOU MUST MAKE THE FOLDER !!!

            $filename = $myFileName . $fileExt;

            if ($debug) {
                print "\n\n<p>filename is " . $filename;
            }


            // now we just open the file for append
            $file = fopen($filename, 'a');

            // write the forms informations
            fputcsv($file, $dataRecord);

            // close the file
            fclose($file);

            //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            //
         // SECTION: 2f Create message
            //
         // build a message to display on the screen in section 3a and to mail
            // to the person filling out the form (section 2g).
            // 
            $message = '<h2>Thank you for your interest in our organisation.</h2>';

            foreach ($_POST as $key => $value) {
                $message .= "<p>";

                // breaks up the form names into words. for example
                // txtFirstName becomes First Name
                $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));

                foreach ($camelCase as $one) {
                    $message .= $one . " ";
                }

                $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
            }


            //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            //
         // SECTION: 2g Mail to user
            //
         // Process for mailing a message which contains the forms data
            // the message was built in section 2f.
            $to = $email; // the person who filled out the form
            $cc = "";
            $bcc = "";

            $from = "Midnight Delivery";

            // subject of mail should make sense to your form
            $todaysDate = strftime("%x");
            $subject = "Your Midnight Delivery application " . $todaysDate;

            $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
        }// end form is valid
    } // ends if form was submitted.
//#############################################################################
//
    // SECTION 3 Display Form
//
    ?>

    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <?php
        //####################################
        //
     // SECTION 3a. 
        // 
        // If its the first time coming to the form or there are errors we are going
        // to display the form.
        if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit 
            print "<h2>Thank you for submitting your application.</h2>";

            print "<p>For your records a copy of this data has ";

            if (!$mailed) {
                print "not ";
            }

            print "been sent:</p>";
            print "<p>To: " . $email . "</p>";

            print $message;
        } else {




            //####################################
            //
         // SECTION 3b Error Messages
            //
         // display any error messages before we print out the form
            if ($errorMsg) {
                print '<div id="errors">' . "\n";
                print "<h2>Sorry, your form has the following mistakes that need to be fixed.</h2>\n";
                print "<ol>\n";

                foreach ($errorMsg as $err) {
                    print "<li>" . $err . "</li>\n";
                }

                print "</ol>\n";
                print "</div>\n";
            }


            //####################################
            //
         // SECTION 3c html Form
            //
         /* Display the HTML form. note that the action is to this same page. $phpSelf
              is defined in top.php
              NOTE the line:
              value="<?php print $email; ?>
              this makes the form sticky by displaying either the initial default value (line ??)
              or the value they typed in (line ??)
              NOTE this line:
              <?php if($emailERROR) print 'class="mistake"'; ?>
              this prints out a css class so that we can highlight the background etc. to
              make it stand out that a mistake happened here.
             */
            ?>
            <div class="container" style="margin-top: 80px;">
                <h1 class="welcomestyle">We are hiring</h1>
                <h4>More information on the <a href="position.php">hiring positions</a></h4>
                <form action="">
                    <fieldset id="form">
                        <fieldset>
                            <legend>Personal information:</legend>
                            <label for="firstname">First name:</label>
                            <input id="firstname"
                                   type="text" 
                                   name="firstname"
                                   placeholder="Enter your first name"
                                   size="20">
                            <br>
                            <br>                   
                            <label for="lastname">Last name:</label>
                            <input 
                                id="lastname"
                                type="text" 
                                name="lastname"
                                placeholder="Enter your last name"
                                size="20">
                            <br>
                            <br>
                            <label for="pronoun">Preferred Pronoun:</label>
                            <input id="pronoun"
                                   type="text" 
                                   name="pronoun"
                                   placeholder="Enter your preferred pronoun"
                                   size="25">
                            <br>
                            <br>
                            <label for="txtEmail">Email:</label>
                            <input id="txtEmail" 
                            <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   type="text" 
                                   name="txtEmail"

                                   placeholder="starboy@email.com">
                            <br>
                            <br>
                            <label for="phone">Phone Number:</label>
                            <input id="phone" 
                                   type="text" 
                                   name="phone"
                                   placeholder="802-123-1234">
                            <br>
                            <br>
                            <label for="resume">Upload your resume:</label>                       
                            <input 
                                type="file" 
                                name="fileToUpload" 
                                id="resume">
                            <br>
                            <br>
                            <label for="campus">Which campus do you live in at UVM? You can refer to this <a href="https://reslife.uvm.edu/halls" target="_blank">link</a>.</label>
                            <br>
                            <select name="campus" size="5">
                                <option value="Athletic Campus">Athletic Campus</option>
                                <option value="Central Campus">Central Campus</option>
                                <option value="North Campus">North Campus</option>
                                <option value="Redstone Campus">Redstone Campus</option>
                                <option value="Other Locations">Other Locations</option>   
                            </select>
                            <br>
                            <br>
                        </fieldset>
                        <fieldset>
                            <legend>Questions:</legend>
                            <label for="radJob">Which type of job do you want to work on?</label>
                            <br>
                            <input type="radio" name="radJob" value="frontend"> Front End<br>
                            <input type="radio" name="radJob" value="backend"> Back End<br>
                            <input type="radio" name="radJob" value="noend"> I don't want a job
                            <br>
                            <br>
                            <label for="knowabout">How did you know about us?</label><br>
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
                        <input type="submit" name="btnSubmit" value=" Submit my application ">
                    </fieldset>
                </form>
            </div>
            <?php
        }
        include "footer.php";
        ?>
    </body>
</html>
