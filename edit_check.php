<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Check Page</title>
</head>
<body>

<?php
//require "create_check.php";
require "check.php";

$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];

$edit_check = new Check($title, $contents);
$title = $edit_check->titleCheck();
$contents = $edit_check->contentCheck();

if($title == false || $contents == false) echo '<form><input type="button" onclick="history.back()" value="戻る"></form>';
if($title && $contents)
{
	echo '<form method="post" action="edit_done.php">';
	echo '<input type="hidden" name="id" value="'.$id.'">';
	echo '<input type="hidden" name="title" value="'.$title.'">';
	echo '<input type="hidden" name="contents" value="'.$contents.'">';
	echo '<br />';
	echo '<input type="button" onclick="history.back()" value="戻る">';
	echo '<input type="submit" value="投稿する">';
	echo '</form>';
}

?>

</body>
</html>