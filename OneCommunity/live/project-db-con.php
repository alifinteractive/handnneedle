<?php 

	$con=mysql_connect("localhost","taqueearsh","arsh#Con5684") 	
	 or die("Could not connect localhost");
	
	$selected = mysql_select_db("handandneedle",$con) 
 	 or die("Could not select handandneedle");
	 

 ?>