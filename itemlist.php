<?php
// Sample code to open a plain text file

$debug = false;

if (isset($_GET["debug"])) {
    $debug = true;
}

$myFileName = "data/list";

$fileExt = ".csv";

$filename = $myFileName . $fileExt;

if ($debug)
    print "\n\n<p>filename is " . $filename;

$file = fopen($filename, "r");

// the variable $file will be empty or false if the file does not open
if ($file) {
    if ($debug)
        print "<p>File Opened</p>\n";
    if ($debug)
        print "<p>Begin reading data into an array.</p>\n";

    // This reads the first row, which in our case is the column headers
    $headers[] = fgetcsv($file);

    if ($debug) {
        print "<p>Finished reading headers.</p>\n";
        print "<p>My header array<p><pre> ";
        print_r($headers);
        print "</pre></p>";
    }
    // the while (similar to a for loop) loop keeps executing until we reach 
// the end of the file at which point it stops. the resulting variable 
// $records is an array with all our data.

    while (!feof($file)) {
        $people[] = fgetcsv($file);
    }

    //closes the file
    fclose($file);

    if ($debug) {
        print "<p>Finished reading data. File closed.</p>\n";
        print "<p>My data array<p><pre> ";
        print_r($records);
        print "</pre></p>";
    }
} // ends if file was opened
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "head.php"; ?>
 <!-- ################ body section ######################### -->
    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <div class="container" style="margin-top: 80px;">
            <p>This page shows a list of the items for sale.</p>
            

            <?php
            print "<table>";
            print "<tr><th>ID</th><th>Food Item</th><th>Price ($)</th><th>Weight (Ounce)</th><th>Image</th></tr>";

            foreach ($people as $person) {
                print "<tr>";

                print "<td>";
                print $person[0];
                print "</td>";

                print "<td >";
                print $person[1];
                print "</td>";

                print "<td >";
                print $person[2];
                print "</td>";
                
                print "<td >";
                print $person[3];
                print "</td>";
                
                print "<td >";
                print '<img src="' . $person[4] . '" alt="' . $person[1] . '">';
                print "</td>";

                print "</tr>";
            }
            print "<tr><th colspan='5'>Total Food Item: " . count($people) . "</th></tr>";
            print "</table>";
            ?>
        </div>
            <?php include "footer.php"; ?>
    </body>
</html>