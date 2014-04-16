<?php 

	$con=mysql_connect("localhost","taqueearsh","arsh#Con5684") 	
	 or die("Could not connect localhost");
	
	$selected = mysql_select_db("handandneedle",$con) 
 	 or die("Could not select handandneedle");
	 

function addProject($data) {		
	
	$SQL = " INSERT INTO `wp_project` SET ";
	$SQL.= " name = '" . $data['project_name'] . "', ";
	$SQL.= " user_id  = '" . $data['user_id '] . "',";
	$SQL.= " embroidery_floss_brand = '" . $data['embroidery_floss_brand'] . "', ";
	$SQL.= " style = '" . $data['style'] . "', ";
	$SQL.= " other_style = '" . $data['other_style'] . "', ";
	$SQL.= " other_material_used = '" . $data['other_material_used'] . "',";
	$SQL.= " pattern = '" . $data['pattern'] . "', ";
	$SQL.= " notes = '" . $data['notes'] . "',";
	$SQL.= " image = '" . $data['image'] . "', ";
	$SQL.= " status = '" . $data['status'] . "',";
	$SQL.= " added_date = NOW(), ";
	$SQL.= " start_date = '" . $data['start_date'] . "',";
	$SQL.= " finish_date = '" . $data['finish_date']."' ";

	$result = mysql_query($SQL);	
	$project_id =  mysql_insert_id();
	
	if(isset($data['project_other_image']) && !empty($data['project_other_image']) ) {
		foreach($data['project_other_image'] as $project_image) {
			$SQL = " INSERT INTO `wp_project_image` SET ";
			$SQL.= " project_id = '" . $project_id . "', ";
			$SQL.= " image = '" . $project_image['image'] . "' ";
			mysql_query($SQL);	
		}
	}
	
 }
 
 function updateProject($data,$project_id) {		
	
	$SQL = " UPDATE  `wp_project` SET ";
	$SQL.= " name = '" . $data['project_name'] . "', ";
	$SQL.= " user_id  = '" . $data['user_id '] . "',";
	$SQL.= " embroidery_floss_brand = '" . $data['embroidery_floss_brand'] . "', ";
	$SQL.= " style = '" . $data['style'] . "', ";
	$SQL.= " other_style = '" . $data['other_style'] . "', ";	$SQL.= " other_material_used = '" . $data['other_material_used'] . "',";
	$SQL.= " pattern = '" . $data['pattern'] . "', ";
	$SQL.= " notes = '" . $data['notes'] . "',";
	$SQL.= " image = '" . $data['image'] . "', ";
	$SQL.= " status = '" . $data['status'] . "',";
	$SQL.= " added_date = NOW(), ";
	$SQL.= " start_date = '" . $data['start_date'] . "',";
	$SQL.= " finish_date = '" . $data['finish_date']."' ";
	$SQL.= " WHERE project_id = '" . $project_id. "' ";
	$result = mysql_query($SQL);
		
	
	if(isset($data['project_other_image']) && !empty($data['project_other_image']) ) {
		mysql_query("DELETE FROM wp_project_image WHERE project_id = '" . $project_id . "' ");

		foreach($data['project_other_image'] as $project_image) {
			$SQL = " INSERT INTO `wp_project_image` SET ";
			$SQL.= " project_id = '" . $project_id . "', ";
			$SQL.= " image = '" . $project_image['image'] . "' ";
			mysql_query($SQL);	
		}
	}
	
 }
 
 function getStyles() {
 	$SQL = " SELECT *  FROM wp_project_style ";
	$style = mysql_query($SQL);
	$styles = array();
	
	while($row = mysql_fetch_array($style)){ 
		
		$styles[] = $row;
	}
	return $styles;
 }
 
 function getProjectStatus() {
 	$SQL = " SELECT *  FROM wp_project_status ";
	$status = mysql_query($SQL);
	$pro_status = array();
	
	while($row = mysql_fetch_array($status)){ 		
		$pro_status[] = $row;
	}
	return $pro_status;
 }
 function getProjects($user_id) {
 	$SQL = " SELECT *  FROM wp_project";
 	$SQL.= " WHERE user_id = '" . (int) $user_id . "'";
	$project = mysql_query($SQL);
	$projects = array();
	$i=0;
	while($row = mysql_fetch_array($project)){ 
		$SQL = " SELECT *  FROM wp_project_image";
 		$SQL.= " WHERE project_id = '" . (int) $row['project_id'] . "'";
		$other_image = mysql_query($SQL);	
		$other_images =array();
		while($row1 = mysql_fetch_array($other_image)){ 
			$other_images[] = $row1;
		}
			
		$projects[$i] = $row;
		$projects[$i]['other_image']= $other_images;
		$i++;
	}
	return $projects;
 }
 
 function getProject($project_id) {
 	$SQL = " SELECT *  FROM wp_project";
 	$SQL.= " WHERE project_id = '" . (int) $project_id . "'";
	$project = mysql_query($SQL);
	$projects = array();
	while($row = mysql_fetch_array($project)){ 
		$SQL = " SELECT *  FROM wp_project_image";
 		$SQL.= " WHERE project_id = '" . (int) $row['project_id'] . "'";
		$other_image = mysql_query($SQL);	
		$other_images =array();
		while($row1 = mysql_fetch_array($other_image)){ 
			$other_images[] = $row1;
		}
			
		$projects = $row;
		$projects['other_image']= $other_images;
	}
	return $projects;
 }
 ?>