<?php
require "dbconnect.php";
//use DBconnect;
class EditDone
{
	private $id;
	private $title;
	private $contents;

	public function __construct($id, $title, $contents)
	{
		$this->id = $id;
		$this->title = $title;
		$this->contents = $contents;
	}
	public function PrepareAndExcute()
	{
		$dbh = databaseConnect();
		$stmt = $dbh->prepare($sql);
		if($data) $stmt->excute($data);
		if($data == null) $stmt->excute();
		//if()
		//$stmt->excute($data);
		$dbh = null;
	}

	public function EditDone()
	{
		$dbh = databaseConnect();
		$sql = 'UPDATE mst_todo SET title=?, content=?, updated_at=CURRENT_TIME WHERE id=?';
		$stmt = $dbh->prepare($sql);
		$data = array($this->title, $this->contents, $this->id);
		$stmt->execute($data);
		$dbh = null;
	}
}
$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$edit_done = new EditDone($id, $title, $contents);
$edit_done->EditDone();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Done Page</title>
</head>
<body>
<h4>タイトル「<?echo $title; ?>」を編集しました。<br /></h4>
<a href="index_display.php">戻る</a>
</body>
</html>