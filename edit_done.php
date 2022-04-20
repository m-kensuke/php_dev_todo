<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Create Done Page</title>
</head>
<body>

<?php
require "dbconnect.php";

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

	public function EditDone()
	{
		$dbh = databaseConnect();
		$sql = 'UPDATE mst_todo SET title=?, content=?, updated_at=CURRENT_TIME WHERE id=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $this->title;
		$data[] = $this->contents;
		$data[] = $this->id;
		$stmt->execute($data);
		$dbh = null;
		return $this->title;
		
	}
}
$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$edit_done = new EditDone($id, $title, $contents);
$title = $edit_done->EditDone();

echo $title;
echo 'を編集しました。<br />';

?>

<a href="index.php">戻る</a>

</body>
</html>