<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Edit Check Page</title>
</head>
<body>

<?php
//require "create_check.php";
require "check.php";
class PostCheck
{
	//private str $title;
	//private str $contents;

	private $title;
	private $contents;
	
	public function __construct($title, $contents)
	{
		$this->title = $title;
		$this->contents = $contents;
	}

	public function titleCheck()
	{
		if($this->title == false) echo '<h4 class="pt-5 pl-4">タイトルを入力してください<br /></h4>';
		if($this->title && mb_strlen($this->title) > 40) echo 'タイトルが文字数オーバーです！<br /></h4>';
		if($this->title && mb_strlen($this->title) < 40) echo '<h4 class="pt-5 pl-4">タイトル：'.$this->title.'<br /></h4>';
		return $this->title;
	}

	public function contentCheck()
	{
		if($this->contents == false) echo '<h4 class="pt-1 pl-4">内容を入力してください<br /><h4>';
		if($this->contents && mb_strlen($this->title) > 255) echo '<h4 class="pt-1 pl-4">内容が文字数オーバーです<br /></h4>';
		if($this->contents && mb_strlen($this->title) < 255) echo '<h4 class="pt-1 pl-4">コンテンツ：'.$this->contents.'<br /><br /><h4>';
		return $this->contents;
	}

	public function CheckDisplay()
	{
		echo '<input type="hidden" name="title" value="'.$this->title.'">';
		echo '<input type="hidden" name="contents" value="'.$this->contents.'">';
		echo '<input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る">';
		echo '<input class="btn btn-primary me-md-2 ml-1" type="submit" value="投稿する">';
	}
}

if(isset($_POST['id'])) $id = $_POST['id'];
$title = (string) $_POST['title'];
$contents = (string) $_POST['contents'];

$post_check = new PostCheck($title, $contents);
$title = $post_check->titleCheck();
$contents = $post_check->contentCheck();

if($title == false || $contents == false) echo '<form class="pl-4 pt-1"><input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る"></form>';
if($title && $contents)
{
	echo '<div class="pt-2 pl-4">';
		echo '<form method="post" action="post_done.php">';
		if(isset($id)) echo '<input type="hidden" name="id" value="'.$id.'">';
		$post_check->CheckDisplay();
		echo '</form>';
	echo '</div>';
}

?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>