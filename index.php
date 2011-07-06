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
		// Another tokenizer
		$tokens = explode ('-',$file);
		/*echo $tokens[0]."<br />";
		echo $tokens[1]."<br />";
		echo $tokens[2]."<br />";	*/
		//echo $tokens[3]."<br />";
		
		if ($tokens[2]) {
			$bookTitle = $tokens[2];
			$bookSeries = $tokens[1];
			$bookAuthor = $tokens[0];
		} elseif ($tokens[1]) {
			$bookSeries = '';
			$bookTitle = $tokens[1];
			$bookAuthor = $tokens[0];
		} else {
			$bookSeries = '';
			$bookTitle = '';
			$bookAuthor = '';
			$booktitle = $tokens[0];
		}

		echo "Author: ".$bookAuthor."<br />";
		echo "Series: ".$bookSeries."<br />";
		echo "Title : ".$bookTitle."<br />";
		echo "File  : ".$file."<br /><hr>";
	
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
