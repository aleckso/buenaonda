<?php

//
class PhotoUpload{
	
	var $upload_dir; 						// The directory for the images to be saved in
	var $upload_path;						// The path to where the image will be saved
	var $large_image_prefix;
	var $large_image_name; 					// New name of the large image (append the timestamp to the filename)
	var $max_file;							
	var $max_width;
	var $allowed_image_types;
	var $allowed_image_ext; 
	var $image_ext;
	var $large_image_location;
	var $file;

	function PhotoUpload(){
		
	}

	function setPhotoUpload($_upload_dir, $_newName, $_file){
		$max_file 	= 100000000;	// Maximum file size in MB
		$max_width 	= "300";		// Max width allowed for the large image
		$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
		$upload_dir 		= $_upload_dir;
		$file 				= $_file;
		$upload_path 		= $upload_dir."/";
		$large_image_name 	= $_newName.$large_image_prefix;
		//
		foreach ($allowed_image_ext as $mime_type => $ext) {
		    $image_ext.= strtoupper($ext)." ";
		}

		$large_image_location = $upload_path.$large_image_name;

		if(!is_dir($upload_dir)){
			mkdir($upload_dir, 0777);
			chmod($upload_dir, 0777);
		}

		$userfile_name 	= $file['name'];
		$userfile_tmp 	= $file['tmp_name'];
		$userfile_size 	= $file['size'];
		$userfile_type 	= $file['type'];
		$filename = basename($file['name']);
		$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
		//
		if((!empty($file)) && ($file['error'] == 0)) {	
			foreach ($allowed_image_types as $mime_type => $ext) {
				if($file_ext==$ext && $userfile_type==$mime_type){
					$error = "";
					break;
				}else{
					$error = "Solo <strong>".$image_ext."</strong> son aceptados<br />";
				}
			}
			if ($userfile_size > ($max_file*1048576)) {
				$error.= "La foto debe ser menor a ".$max_file."MB";
			}
			
		}

		if (strlen($error)==0){		
			if ($file['name']){
				$large_image_location = $large_image_location.".".$file_ext;
				move_uploaded_file($userfile_tmp, $large_image_location);
				chmod($large_image_location, 0777);

				$width = $this->getWidth($large_image_location);
				$height = $this->getHeight($large_image_location);

				if ($width != $max_width){
					$scale = $max_width/$width;
					$uploaded = $this->resizeImage($large_image_location,$width,$height,$scale);
				}else{
					$scale = 1;
					$uploaded = $this->resizeImage($large_image_location,$width,$height,$scale);
				}
			}
		}
		return $large_image_location;
	}


	function resizeImage($image,$width,$height,$scale) {
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
		    case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
		    case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
	  	}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
		  		imagegif($newImage,$image); 
				break;
	      	case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
		  		imagejpeg($newImage,$image,90); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$image);  
				break;
	    }
		
		chmod($image, 0777);
		return $image;
	}

	function getHeight($image) {
		$size = getimagesize($image);
		$height = $size[1];
		return $height;
	}

	function getWidth($image) {
		$size = getimagesize($image);
		$width = $size[0];
		return $width;
	}

}
?>