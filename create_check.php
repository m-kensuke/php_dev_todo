<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Check Page</title>
</head>
<body>

<?php
class Check
{
	private $title;
	private $contents;

	function __construct($title, $contents)
	{
		$this->title = $title;
		$this->contents = $contents;
	}

	function titleCheck()
	{
		if($this->title == false) echo 'タイトルを入力してください<br />';
		if($this->title) echo 'タイトル：'.$this->title.'<br />';
		return $this->title;
	}

	function contentCheck()
	{
		if($this->contents == false) echo '内容を入力してください<br />';
		if($this->contents) echo '内容：'.$this->contents.'<br /><br />';
		return $this->contents;
	}
}

$title = $_POST['title'];
$contents = $_POST['contents'];
//$title = htmlspecialchars($title,ENT_QUOTES,'UTF-8');
//$contents = htmlspecialchars($contents,ENT_QUOTES,'UTF-8');
		
$create_check = new create_check($title, $contents);
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