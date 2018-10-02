<!DOCTYPE html>
<html>
<head>
<title>iView Lead Email Generator</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- fix for Internet Explorer -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<body class="bg-dark">
  <div class="container">
<?php
error_reporting(0);

// check if csv file exist and if it doesnt display error and QuickHashIntHash
clearstatcache();
$file = 'uploads/iView.csv';
if (!file_exists($file)){
  exit("<h2 class='text-danger'>Error - File does not exist</h2> <br /><a href='index.php' class='btn btn-info'>Return to Home</a>");
}

// open the uploaded csv file, read it and store it in iviews array
$file_handle = fopen('uploads/iView.csv', 'r');
while (!feof($file_handle)){
  $iviews[] = fgetcsv($file_handle);
}
fclose($file_handle);

// get the number of elements (rows) in the csv file and display the number
$iviewCount = count($iviews);
echo '<p class="text-light">There are ' . $iviewCount . ' entries in the uploaded file</p>';
// get the number of items for each entry should only be 3 name, email, and center id then print the number
$iviewElements = count($iviews[0]);
echo '<p class="text-light">Each entry has ' . $iviewElements . ' elements in its row </p>';

// display all of the info from the csv in a table to verify the upload was correct.
echo '<br /> <table style="border-spacing: 6px">';
for ($i=0; $i < $iviewCount ; $i++) {
  echo '<tr>';
  for ($j=0; $j < $iviewElements ; $j++) {
    echo '<td class="text-light">';
    echo ucwords(strtolower($iviews[$i][$j]));
    echo '</td>';
  }
  echo '</tr>';
}
echo '</table>';
echo '<br />';
echo '<p><a href="index.php" class="btn btn-info">Return to Main Menu</a> &nbsp;<a href="email.php" class="btn btn-success">Send iView Emails</a></p>';
 ?>
 </div>
 <script src="js/jquery-3.3.1.slim.min.js"></script>
 <script src="js/popper.min.js" ></script>
 <script src="js/bootstrap.min.js"></script>
 </body>
 </html>
