<?php 

	$con=mysql_connect("localhost","root","") 	
	 or die("Could not connect localhost");
	
	$selected = mysql_select_db("onecommunity",$con) 
 	 or die("Could not select onecommunity");

 ?>