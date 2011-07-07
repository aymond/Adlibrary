<?php

function display_new_book_in_form($action, $file, $bookTitle, $bookSeries, $bookAuthor, $bookTitle){
include 'libraryConfig.php';
?>
<br>
<form action="<?php echo $action ?>" method="post">
<div class=box><a href="<?php echo "library_upload/".rawurlencode($file);?>">
<img src=<?php echo $_downloadIcon; ?> alt="Download EBook" title="Download book"></a>
<input type="text" size="90" name="fileName" id="fileName" value="<?php echo $file; ?>" />
<input type="text" size="25" name="bookAuthor" id="bookAuthor" value="<?php echo $bookAuthor; ?>" />
<input type="text" size="35" name="bookSeries" id="bookAuthor"value="<?php echo $bookSeries; ?>" />
<label for="bookTitle">Title</label><input type="text" size="50" name="bookTitle" id="bookTitle" value="<?php echo $bookTitle; ?>" />
<input type="image" src=<?php echo $_updateDatabaseIcon; ?> value="submit" alt="Submit" title="Add book to library"/>
</div>
</form>
<?php }?>

