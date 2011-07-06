<html><head><title>ADLibrary</title>
<link rel="stylesheet" href="css/library.css" media="all"></head>
<body>
<b>List of files that have not been processed.</b><br><hr>
<?php 
include 'sharedFunctions.php';
include 'libraryConfig.php';
$files = read_folder_directory($library_uploadDir);

?><table><tr><td>Link</td><td>File Name</td><td>Author</td><td>Series</td><td>Title</td></tr><?php
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
	        ?>
		<form action=action.php" method="post">		
		<tr <?php if ($row==''){echo "class=\"D0\"";$row=1;}else{echo"class=\"D1\"";$row='';}?>>
		<td><?php $fileURL="library_upload/".rawurlencode($file);?><a href=<?php echo $fileURL; ?> ><img src='/images/Files-Download-File-icon48x48.png'></a></td>
		<td><input type="text" size="90" name="fileName" value="<?php echo trim($file); ?>" /></td>
		<td><input type="text" size="25" name="bookAuthor" value="<?php echo trim($bookAuthor); ?>" /></td>
		<td><input type="text" size="35" name="bookSeries" value="<?php echo trim($bookSeries); ?>" /></td>
		<td><input type="text" size="50" name="bookTitle" value="<?php echo trim($bookTitle); ?>" /></td>
		<td><img src='/images/Misc-Upload-Database-icon48x48.png'></td>
		</tr></form><?php
	} 
} else {
	echo "No files available";
}
?>
</table>
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
