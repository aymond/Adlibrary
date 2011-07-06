<html><head><title>ADLibrary</title></head>
<body>
<b>List of files that have not been processed.</b><br><hr>
<?php 
include 'sharedFunctions.php';
include 'libraryConfig.php';
$files = read_folder_directory($library_uploadDir);

if ($files) 
{ 
	// $files is an array of filenames
	foreach ($files as $file) 
	{ 
		// Tokenize filename so we can extract book details.
		$tokens = explode ('-',$file);
		
		if ($tokens[2]) {
			// Finds the last . in the name, and copies the string until this character
			$bookTitle = substr($tokens[2], 0, strrpos($tokens[2], '.'));
			$bookSeries = $tokens[1];
			
			$bookAuthor = $tokens[0];
		} elseif ($tokens[1]) {
			$bookSeries = '';
			$bookTitle = substr($tokens[1], 0, strrpos($tokens[1], '.'));
			$bookAuthor = $tokens[0];
		} else {
			$bookSeries = '';
			$bookTitle = '';
			$bookAuthor = '';
			$bookTitle = substr($tokens[0], 0, strrpos($tokens[0], '.'));
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
