<?php 
include '../libraryConfig.php';
include '../sharedFunctions.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){

	$title = safe(htmlspecialchars($_POST['bookTitle']));
	$author = safe(htmlspecialchars($_POST['bookAuthor']));
	$series = safe(htmlspecialchars($_POST['bookSeries']));
	$year = safe(htmlspecialchars($_POST['bookYear']));
	$filename = safe(htmlspecialchars($_POST['fileName']));
	$bookcategories = safe(htmlspecialchars($_POST['bookCategories']));
	

	print $title . "&nbsp";
	print $author . "&nbsp";
	print $series . "&nbsp";
	print $year . "&nbsp";
	print $filename."<br>";

	db_insertNewBook($title,$author,$year,$series,$filename);	
}
?>


