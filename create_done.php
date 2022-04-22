<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Done Page</title>
</head>
<body>

<?php
require_once "dbconnect.php";
//require "create_check.php";
//use DBconnect;

class CreateDone
{
	private $title;
	private $contents;

	public function __construct($title, $contents)
	{
		$this->title = $title;
		$this->contents = $contents;
	}

	public function CreateDone()
	{
		$dbh = databaseConnect();
		$sql = 'INSERT INTO mst_todo(title,content,created_at,updated_at) VALUES (?,?,CURRENT_TIME,CURRENT_TIME)';
		$stmt = $dbh->prepare($sql);
		$data = array($this->title,  $this->contents);
		//$data[] = $this->contents;
		$stmt->execute($data);
		$dbh = null;

		return $this->title;
	}
}

$title = $_POST['title'];
$contents = $_POST['contents'];
$create_done = new CreateDone($title, $contents);
$title = $create_done->CreateDone();

echo $title;
echo 'を追加しました。<br />';

?>

<a href="index_display.php">戻る</a>

</body>
</html>