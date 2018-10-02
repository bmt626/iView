<!DOCTYPE html>
<html>
<head>
<title>iView Lead Email Generator</title>
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- fix for Internet Explorer -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<body class="bg-dark">
  <div class="container">
<p class="text-warning"><?php
error_reporting(0);
$lastiview = "uploads/lastIview.txt";
if (file_exists($lastiview)){
    echo  file_get_contents("uploads/lastIview.txt");
}?>
</p>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <h3 class="text-light">Select iView CSV to upload:</h3>
    </br>
    <input type="file" class="btn btn-outline-light" name="fileToUpload" id="fileToUpload">
    </br>
    </br>
    <a href="checkiviews.php" class="btn btn-outline-info">Verify iView upload</a>
    <input type="submit" class="btn btn-success" value="Upload iViews" name="submit">
</form>
<br />


</div>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
