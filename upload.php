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
$fileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . 'iView' . '.' . $fileType;
$uploadOk = 1;

if($fileType != 'csv' && $fileType != 'CSV'){
  echo "<h2 class='text-danger'>Your upload must be a CSV </h2>";
  $uploadOk = 0;
}

if ($uploadOk == 0){
  echo "<h2 class='text-danger'>Your file was not uploaded!</h2>";
}else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "<h2 class='text-success'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h2>";
      } else {
          echo "<h2 class='text-danger'>Sorry, there was an error uploading your file.</h2>";
      }
}
echo '<p><a href="index.php" class="btn btn-info">Return to Main Menu</a> &nbsp; <a href="checkiviews.php" class="btn btn-success">Verify iView Upload</a></p>';
?>
</div>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
