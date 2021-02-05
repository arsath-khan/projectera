<?php
$group="";
$group=$_GET['group'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modern Homepage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- <link rel="stylesheet" href="css/product_style.css"> -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nova+Round&display=swap">
<style>
*{
  box-sizing: border-box
  padding:0;
  margin:0;
}
body{
  font-family:roboto;
  min-height: 1000px;
  background-color:whitesmoke
}
h1,h2,h3,h4,h5,h6{
  font-family:'Nova Round' , cursive;
}
header{
  line-height: 10px;
  position: static;
  top:0;
  left: 0;
  height: auto;
  width: 100%;
  padding: 40px 80px;
  background: linear-gradient(to top,transparent,rgba(0,0,0,0.9));
  background-color:orange;
  margin-bottom: 0;

}
header #logo{
  font-size: 28px;
  font-weight: 700;
  color:#ffae00;
  font-style: italic;
  text-align: center;
  font-family: roboto;
  float: left;
}
header #logo:hover{
  transform: rotate(3deg)scale(1.5);
}
header #menu{
  float: right;
  margin-right: 0;


}
header #menu:hover{
transform: scale(1.1);
}
header ul li{
  display: inline-block;
  margin-right: 10px;

  margin-bottom: 20px;

}
header ul li a{
  position: relative;
  text-decoration: none;
  font-size: 20px;
  color:#ffae00;
  padding-bottom: 2px;
  margin: 0 5px 0 0;
  font-weight:300;
  letter-spacing: 1px;
}
header ul li:nth-child(5){
  margin-right: 0px;
}
header ul li :hover{
  transform: scale(1.1);
  color: #ffae00;
  text-decoration: none;
  box-shadow: 0 0px 25px rgba(0,0,0,0);


}
header ul li a:before{
  position:absolute;
  content:'';
  left:0;
  bottom:0;
  height:3px;
  width:100%;
  background:#ffc107;
  transform:scaleX(0);
  transform-origin: right;
  transition: transform .4s linear;


}
header ul li a:hover:before{
  transform:scaleX(1);
  transform-origin: left;
  text-decoration:none;
  color:white;

}
#container{
  padding:0 0 0 25px;
  margin:25px 0 0 0;


}



  img{
  height:300px;
    width: 100%;
    margin-bottom: 15px;
    overflow: hidden;

}
.post{
  width:100%;
}
#hold{
  width:100%;
}
#s{
  padding: 20px;
  border: 1px solid orange;
  margin-bottom:20px;
  background-color: white;
}
#s:hover{

box-shadow: 0 0px 25px rgba(0,0,0,0.3);
}

#content{
  padding: 0;
  margin:20px 0 0 0;
  width:100%;
}
.ajax-loader {
 margin-top:50px;
    display: block;
    text-align: center;
}
.ajax-loader img {
    width: 100px;
 height:100px;
    vertical-align: middle;
}
#total_count{
display:none;
}




/*-----------------------------response---------------*/

@media (max-width:950px){
  header{
    padding: 0;
    margin: 0;
  }
header #logo{
  float: none;
  padding:15px 0 0 0;
  margin:0;
}
header #menu{
  text-align: center;
  float: none;
  margin: 20px;
  padding: 0;
  box-shadow:0;
}
}
@media (max-width:450px){
  header #menu li a{

  font-size: 0.9em;
  }

</style>
</head>
<body>
  <header>
   <div id="logo">'TrendY / ZonE'</div>
   <div id="menu">
     <ul>
      <li><a href="homepage.html">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Latest</a></li>
      <li><a href="product.php">Fashion</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
    </div>
  </header>
<div id="container">
    <?php
          require_once ('fun/db.php');
			$sqlQuery = "SELECT * FROM $group";
            $result = mysqli_query($conn, $sqlQuery);
            $total_count = mysqli_num_rows($result);
			$sqlQuery = "SELECT * FROM $group ORDER BY upload_on DESC LIMIT 8";
            $result = mysqli_query($conn, $sqlQuery);

	?>
  <div class="pnn" id="<?php echo $group ?>"  style="display:none"></div>
	<input type="button" name="total_count" id="total_count"
            value="<?php echo $total_count; ?>" />
   <div id="hold" class="row">
               <?php
            while ($row = mysqli_fetch_assoc($result)) {
				$filename='database/'.$group.'/'.$row['file_name'];
                ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 post" id="<?php echo $row['id']; ?>">
      <div id="s"><img  src="<?php echo $filename;?>"></img>
      <p id="content"><?php echo $row['upload_on']; ?></p></div>
    </div>
	<?php
      }
    ?>

   </div>

   <div class="ajax-loader text-center">
                <img src="img/LoaderIcon.gif"> Loading more posts...
            </div>


</div>
<script type="text/javascript">


$(document).ready(function(){
        windowOnScroll();
});
function windowOnScroll() {
       $(window).on("scroll", function(e){
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            if($(".post").length < $("#total_count").val()) {
                var lastId = $(".post:last").attr("id");
                var group = $ (".pnn").attr("id");
                getMoreData(lastId,group);
            }
        }
    });
}

function getMoreData(lastId,group) {
       $(window).off("scroll");
    $.ajax({
        url: 'fun/getMoreData.php?lastId=' + lastId + '&group=' + group,
        type: "get",
        beforeSend: function ()
        {
            $('.ajax-loader').show();
        },
        success: function (data) {
        	   setTimeout(function() {
                $('.ajax-loader').hide();
            $("#hold").append(data);
            windowOnScroll();
        	   }, 500);
        }
   });
}
</script>
</body></html>
