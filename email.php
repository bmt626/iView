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

// load the iview csv
$file_handle = fopen('uploads/iView.csv', 'r');
while (!feof($file_handle)){
  $iviews[] = fgetcsv($file_handle);
}
fclose($file_handle);

// get the number of elements (rows) in the csv file
$iviewCount = count($iviews);

$kumonemail = 'customercare@kumon.com';

for ($i=0; $i < $iviewCount ; $i++) {
  $to = $iviews[$i][1];
  $subject = ucwords(strtolower($iviews[$i][2])) . " Kumon Math and Reading";
  $headers = "From: " . $kumonemail . "\r\n";
  $headers .= "Reply-To: " . $kumonemail . "\r\n";
  $headers .= "BCC: " . $kumonemail . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
  $message .= '<p>Dear&nbsp;'. ucwords(strtolower($iviews[$i][0])) . ',</p>';
  $message .= '<p> Thank you for your interest in Kumon of ' . ucwords(strtolower($iviews[$i][2])) . '.&nbsp; Our
              after-school math and reading program helps children of all ages and academic
              abilities.</p>';
  $message .= '<p>&nbsp;</p>';
  $message .= '<p>Getting started is easy. The first step is to attend a free parent orientation at the center with your child.
              Your child will be given a placement test.  The results will be used to create a customized study plan.  During this brief session,
              the instructor can tell you more about the benefits and details of how Kumon can address your individual needs.  There is no obligation to enroll at the time of the orientation.</p>';
  $message .= '<p>&nbsp;</p>';
  $message .= '<p>Kumon has helped more than 16 million students worldwide develop a love of learning.  Unlike tutoring, Kumon&#39;s after-school program gives
              students the tools and techniques needed to become critical thinkers and life-long independent learners. The program was founded more than
              50 years ago, and is a leading education provider in 47 countries around the world.</p>';
  $message .= '<p>&nbsp;</p>';
  $message .= 'A representative from Kumon will contact you by phone to schedule a free placement test and orientation.
              Please reply to this message if you would prefer to schedule your parent orientation via email.';
  $message .= '<table border=1 style="text-align: center">';
  $message .= '<tr><td><strong>Student Name(s)</strong></td><td width=241><p>&nbsp;</p></td></tr>';
  $message .= '<tr><td><strong>Student Grade(s) (Pre-K - 12)</strong></td><td width=241><p>&nbsp;</p></td></tr>';
  $message .= '<tr><td><strong>Math/Reading/Both</strong></td><td width=241><p>&nbsp;</p></td></tr>';
  $message .= '<tr><td><strong>Reason for exploring Kumon &nbsp;</strong></td><td width=241><p>&nbsp;</p></td></tr>';
  $message .= '<tr><td><strong>How did you hear about us &nbsp;</strong></td><td width=241><p>'. $iviews[$i][3] .'</p></td></tr>';
  $message .= '</table>';
  $message .= '<p>&nbsp;</p>';
  $message .= '<p>Regards,</p>';
  $message .= '<p><i>Kumon Customer Service</i></p>';

  // send the email
  mail($to, $subject, $message, $headers);
}

// save last iview sent and the time
$txt_time =  date("l, F jS, Y h:i A");
$lastcount = $iviewCount;
while($iviews[$lastcount][0] == ''){
  $lastcount --;
}
$txt = $txt_time . " - " . ucwords(strtolower($iviews[$lastcount][0]));
file_put_contents("uploads/lastIview.txt", $txt);




// delete the iview leads csv
if (!unlink($file))
  {
  echo ("<h2 class='text-danger'>Emails have been sent but there was an error deleting $file</h2>");
  echo '<p><a href="index.php" class="btn btn-info">Return to Main Menu</a></p>';
  }
else
  {
  echo ("<h2 class='text-success'>Emails have been sent and the $file has been deleted</h2>");
  echo '<p><a href="index.php" class="btn btn-info">Return to Main Menu</a></p>';
  }

?>
</div>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
