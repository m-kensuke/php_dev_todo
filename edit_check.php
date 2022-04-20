<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Check Page</title>
</head>
<body>

<?php
//require "create_check.php";
class edit_check
{
	private $title;
	private $contents;

	public function __construct($title, $contents)
	{
		$this->title = $title;
		$this->contents = $contents;
    }
	public function titleCheck()
	{
		if($this->title == false) echo 'タイトルを入力してください<br />';
		if($this->title) echo 'タイトル：'.$this->title.'<br />';
		return $this->title;
	}
	public function contentCheck()
	{
		if($this->contents == false) echo '内容を入力してください<br />';
		if($this->contents) echo '内容：'.$this->contents.'<br /><br />';
		return $this->contents;
	}

}

$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];

$edit_check = new edit_check($title, $contents);
$title = $edit_check->titleCheck();
$contents = $edit_check->contentCheck();
//check = new create_check($title, $contents);
//$check->titleCheck();
//$check->contentCheck();

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