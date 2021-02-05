<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/upload_style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta charset="utf-8">
</head>
<body>
  <div id="main">
    <header>
     <div class="logo">'TrendY / ZonE'</div>
     <div class="menu">
       <ul>
        <li><a href="homepage.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Fashion</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
      </div>
    </header>
  <div id="container">
   <form action="#" method="post" enctype="multipart/form-data">
   <div id="form">
   <div id="form1">
    <input type="text" class="form-control" id="productname" name="productname" placeholder="Product name" required>
    <textarea name="description" rows="8" cols="20" class="form-control" id="description" placeholder="Description" required></textarea>
    <select id="type" name="type" class="form-control" required>
    <option value="Jeans">Jeans</option>
    <option value="Saree">Saree</option>
    <option value="Shirt">Shirt</option>
    <option value="Pant">Pant</option>
    <option value="T-shirt">T-shirt</option>
    <option value="Chudithar">Chudithar</option>
    <option value="Top">Top</option>
    </select>
    </div>

    <div id="form2">
      <select id="agegroup" name="agegroup" class="form-control" required>
      <option value="men">Men</option>
      <option value="women">Women</option>
      <option value="children">Children</option>
      <option value="child">Child</option>
      <option value="baby">Baby</option>
      </select>
      <input type="number"  class="form-control" id="price" name="price" placeholder="Price" required>
    <input type="file"  id="img" name="file" placeholder="Your name" required>
    <label for="img">Choose photo</label>
    </div>
  </div>
<input type="submit" class="form-control" name="submit" id="upload" value="Upload">
   </form>

  </div>
</div>
</body>
</html>
<?php
// Include the database configuration file
include 'fun/dbConfig.php';
$statusMsg = '';
$productname=$type=$agegroup=$description='';
$price=0;

// File upload path
$productname=$_POST["productname"];
$type=$_POST['type'];
$agegroup=$_POST['agegroup'];
$description=$_POST['description'];
$price=$_POST['price'];

$targetDir = "database/$agegroup/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');

    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into $agegroup (file_name,product_name,type, upload_on,description,price) VALUES ('".$fileName."','$productname','".$type."',NOW(),'".$description."','".$price."')");
            if($insert){
              $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }
    else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
    }
}
else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
