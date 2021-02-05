<?php
    $name=$response=$color="";
    $name=$_GET['name'];
    $response=$_GET['response'];
    $color=$_GET['color'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Response</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="css/response_style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nova+Round&display=swap">
  </head>
  <body>
    <div id="container" style="border:2px solid <?php echo $color; ?> ">
      <div id="container1">
      <img src="img/<?php echo $name?>"></img>
      <p><?php echo $response ?></p>
      </div>
    </div>

  </body>
</html>
