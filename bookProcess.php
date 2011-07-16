<?php
function display_new_book_in_form($action, $file, $bookTitle, $bookSeries, $bookAuthor, $bookTitle){
include 'libraryConfig.php';
?>
<br>
<form action="<?php echo $action ?>" method="post">
<div class=box><a href="<?php echo "library_upload/".rawurlencode($file);?>">
<img src=<?php echo $_downloadIcon; ?> alt="Download EBook" title="Download EBook"></a>
<input type="text" size="90" name="fileName" id="fileName" value="<?php echo $file; ?>" />
<input type="text" size="25" name="bookAuthor" id="bookAuthor" value="<?php echo $bookAuthor; ?>" />
<input type="text" size="35" name="bookSeries" id="bookSeries"value="<?php echo $bookSeries; ?>" />
<label for="bookTitle">Title</label><input type="text" size="50" name="bookTitle" id="bookTitle" value="<?php echo $bookTitle; ?>" />
<input type="image" src=<?php echo $_updateDatabaseIcon; ?> value="submit" alt="Submit" title="Add book to library"/>

</div>
</form>
<?php }?>

<?php function display_new_book_in_form2($action, $file, $bookTitle, $bookSeries, $bookAuthor, $bookTitle){
include 'libraryConfig.php';
?>
<form action="<?php echo $action ?>" method="post">
<div class=box>
<TABLE WIDTH=100% BORDER=0 BORDERCOLOR="#000000" CELLPADDING=0 CELLSPACING=0>
	<TR VALIGN=TOP>
		<TD ROWSPAN=5 WIDTH=80 title='book cover'><P><img src=<?php echo $_defaultBookCover; ?> alt="Book Cover" title="Book Cover"><BR>
<?php if (strpos($file, '.pdf')){
	imagepng(makePDFCover($file),"test.png");
}?>
	<img src="test.png")
</P></TD>
		<TD ><label for="bookTitle"><span class="title">Title</span><input type="text" size="50" name="bookTitle" id=bookTitle value="<?php echo $bookTitle; ?>" /></label></TD>
		<TD ROWSPAN=2 ><label for="bookTags"><span class="title">Tags</span><input type="text" size="50" name="bookTags" id=bookTags value="" /></label></TD>
		<TD ROWSPAN=2><img src=<?php echo $_downloadIcon; ?> alt="Download EBook" title="Download EBook"></TD>
	</TR>
	<TR VALIGN=TOP>
		<TD ><label for="bookSeries"><span class="title">Series</span><input type="text" size="35" name="bookSeries" id=bookSeries value="<?php echo $bookSeries; ?>" /></label></TD>
	</TR>
	<TR VALIGN=TOP>
		<TD ><label for="bookAuthor"><span class="title">Author</span><input type="text" size="25" name="bookAuthor" id=bookAuthor value="<?php echo $bookAuthor; ?>" /></label></TD>
		<TD ROWSPAN=2 ><label for="bookCategories"><span class="title">Categories</span><input type="text" size="50" name="bookCategories" id=bookCategories value="" /></label></TD>
		<TD ROWSPAN=3 ><input type="image" src=<?php echo $_updateDatabaseIcon; ?> value="submit" alt="Submit" title="Add book to library"/></TD>
	</TR>
	<TR VALIGN=TOP>
		<TD ><label for="fileName"><span class="title">File name</span><input type="text" size="90" name="fileName" id=fileName value="<?php echo $file; ?>" /></label></TD>
	</TR>
	<TR VALIGN=TOP>
		<TD ><P>9<BR></P></TD>
		<TD ><P>10<BR></P></TD>
	</TR>
</TABLE>
</div>
</form>

<?php }?>

