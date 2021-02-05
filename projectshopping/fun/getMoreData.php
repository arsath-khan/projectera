<?php
require_once('db.php');
$lastId = $_GET['lastId'];
$group =$_GET['group'];
$sqlQuery = "SELECT * from $group  WHERE id < '".$lastId."' ORDER BY upload_on DESC LIMIT 8";

$result = mysqli_query ($conn, $sqlQuery);

while ($row = mysqli_fetch_assoc($result))
 {
	 $filename='database/'.$group.'/'. $row ['file_name'] ;
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 post" id="<?php echo $row['id']; ?>">
<div id="s">
      <img  src="<?php echo $filename;?>"></img>
      <p id="content"><?php echo $row['upload_on']; ?></p>
    </div>
  </div>
<?php
}
?>
