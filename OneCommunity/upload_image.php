<?php 
		
		define ('SITE_ROOT', realpath(dirname(__FILE__)));

		$json = array();
		
		if (!empty($_FILES['file']['name'])) {
			$filename = basename($_FILES['file']['name']);
			
			 $file = basename($filename);
				// Hide the uploaded file name so people can not link to it directly.
				$json['file'] = $file;
				
				if(move_uploaded_file($_FILES['file']['tmp_name'], SITE_ROOT.'/user_image/'.$file)) { 	
				$json['success'] = "you have successfully uploaded the file!";
				
				} else {
					$json['error'] = "File can not be uploaded!";
				}
			}
			
		echo json_encode($json);	
 ?>