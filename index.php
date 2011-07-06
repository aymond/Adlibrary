<html><head><title>ADLibrary</title></head>
<body>
<b>List of files that have not been processed.</b><br><hr>
<?php 
include 'sharedFunctions.php';
include 'libraryConfig.php';
//$files = read_folder_directory ($_SERVER["DOCUMENT_ROOT"].$library_uploadDir); 
$files = read_folder_directory ($library_uploadDir);

if ($files) 
{ 
	foreach ($files as $file) 
	{ 
		// Check the file name for book title and author.		
		$pos1 = stripos($file, '-');
		if ($pos1 == true){
		 echo $file.$pos1."<br/>";
		} else {
		}
	} 
} 
?>
<form action="action.php" method="post">
<p>Book Title: <input type="text" name="title" /> </p>
<p>Book Author: <input type="text" name="author" /> </p>
<p>Year Published: <input type="text" name="year" /> </p>
<p>Filename: <input type="text" name="filename" /> </p>

<p><input type="submit" /></p>
</form>
</body>
</html>
