<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Check Page</title>
</head>
<body>

<?php
require "check.php";

$title = $_POST['title'];
$contents = $_POST['contents'];
		
$create_check = new Check($title, $contents);
$title = $create_check->titleCheck();
$contents = $create_check->contentCheck();

if($title == false || $contents == false)	echo '<form><input type="button" onclick="history.back()" value="戻る"></form>';
if($title && $contents)
{
	echo '<form method="post" action="create_done.php">';
	echo '<input type="hidden" name="title" value="'.$title.'">';
	echo '<input type="hidden" name="contents" value="'.$contents.'">';
	echo '<input type="button" onclick="history.back()" value="戻る">';
	echo '<input type="submit" value="投稿する">';
	echo '</form>';
}

?>

</body>
</html>