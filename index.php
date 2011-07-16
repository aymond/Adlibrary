<html><head><title>ADLibrary</title>
<link rel="stylesheet" href="css/library.css" media="all"></head>
<body>
<b>List of files that have not been processed.</b><br><hr>
<?php 
include 'sharedFunctions.php';
include 'libraryConfig.php';
include 'bookProcess.php';
$files = read_folder_directory($library_uploadDir);

if ($files) 
{ 
	// $files is an array of filenames
	foreach ($files as $file) 
	{ 
		// Tokenize filename so we can extract book details.
		$tokens = explode ('-',$file);
		
		if (!empty($tokens[2])) {
			// Finds the last . in the name, and copies the string until this character
			$bookTitle = trim(substr($tokens[2], 0, strrpos($tokens[2], '.')));
			$bookSeries = trim($tokens[1]);
			
			$bookAuthor = trim($tokens[0]);
		} elseif (!empty($tokens[1])) {
			$bookSeries = '';
			$bookTitle = trim(substr($tokens[1], 0, strrpos($tokens[1], '.')));;
			$bookAuthor = trim($tokens[0]);
		} else {
			$bookSeries = '';
			$bookTitle = '';
			$bookAuthor = '';
			$bookTitle = trim(substr($tokens[0], 0, strrpos($tokens[0], '.')));
		}
		
		if (strpos($file, '.pdf')){makePDFCover($file);}
	        display_new_book_in_form2('action.php', $file, $bookTitle, $bookSeries, $bookAuthor, $bookTitle);
		
	} 
} else {
	echo "No files available";
}
?>
</table>
<?php display_new_book_in_form2();?>
<label>
<form action="action.php" method="post">
<p>Book Title: <input type="text" name="title" /> </p>
<p>Book Author: <input type="text" name="author" /> </p>
<p>Year Published: <input type="text" name="year" /> </p>
<p>Filename: <input type="text" name="filename" /> </p>

<p><input type="submit" /></p>
</form>
</label>
</body>
</html>
