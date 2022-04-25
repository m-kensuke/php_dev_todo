<?php

class Check
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
		if($this->title && mb_strlen($this->title) > 40) echo 'タイトルが文字数オーバーです！<br />';
		if($this->title && mb_strlen($this->title) < 40) echo 'タイトル：'.$this->title.'<br />';
		return $this->title;
	}

	public function contentCheck()
	{
		if($this->contents == false) echo '内容を入力してください<br />';
		if($this->contents && mb_strlen($this->title) > 255) echo '内容が文字数オーバーです<br />';
		if($this->contents && mb_strlen($this->title) < 255) echo '内容：'.$this->contents.'<br /><br />';
		return $this->contents;
	}

	
}

?>