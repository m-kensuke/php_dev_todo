<?php
require_once 'class/dbconnect.php';
class Check extends DBconnect
{
    protected $id;
    protected $title;
	protected $contents;
	
    public function __construct($id, $title, $contents)
	{
        parent::__construct();
        $this->id = $id;
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
?>