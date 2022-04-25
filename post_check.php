<?php include 'inc/head.php'; ?>

<body>
<?php
class PostCheck
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
<?php include 'inc/bootstrap.php';?>
</body>
</html>