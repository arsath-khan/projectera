
function myfunction()
{

  var xhttp=new XMLHttpRequest();
   xhttp.onreadystatechange=function(){
	   if(xhttp.readyState==4 && xhttp.status ==200)
		{
         console.log(xhttp.responseText);
		}
   };
 xhttp.open("GET","server.txt",true);
  xhttp.send();
}