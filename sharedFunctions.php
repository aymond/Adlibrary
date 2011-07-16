<?php
function read_folder_directory($dir){ 
	$listDir = array(); 
	if($handler = opendir($dir)) { 
		while (($sub = readdir($handler)) !== FALSE) { 
			if ($sub != "." && $sub != ".." ) { 
				if(is_file($dir."/".$sub)) { 
					$listDir[] = $sub; 
				}elseif(is_dir($dir."/".$sub)){ 
					$listDir[$sub] = ReadFolderDirectory($dir."/".$sub); 
				} 
			} 
		} 
		closedir($handler); 
	} 
	return $listDir; 
} 

function makePDFCover($filePath){
	//header( 'image/png' );
	header('Content-Type: image/png');
        $im = new imagick($filePath."[0]");
        $im->setImageFormat("png");
        $im->setImageDepth("8");
        $im->setImageCompressionQuality(90);
        $im->scaleImage(500,0);
	imagepng($im, "file.png");
	imagedestroy($im);
}

function db_insertNewBook($bookTitle,$bookAuthor,$bookYear,$bookSeries,$file){
  # TODO Insert into database. Get the correct time and date for the timedate field.
	$sql= "INSERT INTO 
		book (title, author, year, series, filename, dateAdded ) 
		VALUES
		('$bookTitle','$bookAuthor','$bookYear','$bookSeries','$file',NOW());";
	mysql_query($sql) or die('Query ' .$sql . ' failed.' . mysql_error());
}

function safe($value){ 
   return mysql_real_escape_string($value); 
}
?>



