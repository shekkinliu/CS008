<?php
// Sample code to open a plain text file

$debug = false;

if (isset($_GET["debug"])) {
    $debug = true;
}

$myFileName = "data/food";

$fileExt = ".csv";

$filename = $myFileName . $fileExt;

if ($debug) {
    print "\n\n<p>filename is " . $filename;
}
$file = fopen($filename, "r");

// the variable $file will be empty or false if the file does not open
if ($file) {
    if ($debug) {
        print "<p>File Opened</p>\n";
    }
    if ($debug) {
        print "<p>Begin reading data into an array.</p>\n";
    }
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
        $food[] = fgetcsv($file);
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
    <head>
        <title>Menu - Midnight Delivery</title>
        <?php include "head.php"; ?>
    </head>
    <!-- ################ body section ######################### -->
    <body>
        <div>
            <?php include "nav.php"; ?>
        </div>
        <div id="menu" class="container textcolor centertext" style="margin-top: 80px;">
            <h3 class="bold">Menu Page</h3>
            <h6> ~~Click on the image for more detail~~</h6>
            <br>
            <br>
            <div id='imagelist'>
                <?php
                foreach ($food as $item) {
                    print '<a href="#' . $item[2] . '">';
                    print '<img src="' . $item[4] . '" alt="' . $item[1] . '">';
                    print '</a>';
                }
                ?>
            </div>
            <br>
            <br>
            <br>
            <div id="menutable">
                <?php
                print "<table id='menutable'>";
                print "<tr><th>Item ID</th><th>Food Item</th><th>Price <sub>($)</sub></th><th>Weight <sub>(Ounce)</sub></th><th>Image</th></tr>";

                foreach ($food as $item) {
                    print "<tr>";

                    print '<td id="' . $item[2] . '">';
                    print $item[0];
                    print "</td>";

                    print "<td>";
                    print $item[1];
                    print "</td>";

                    print "<td>";
                    print $item[2];
                    print "</td>";

                    print "<td>";
                    print $item[3];
                    print "</td>";

                    print "<td>";
                    print '<img src="' . $item[4] . '" alt="' . $item[1] . '">';
                    print "</td>";

                    print "</tr>";
                }
                print "</table>";
                ?>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>