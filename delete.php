<?php
require_once "dbconnect.php";
class Delete
{
	private $id;
	function __construct($id)
	{
		$this->id = $id;
	}

	public function Delete()
	{
		$dbh = databaseConnect();
		$sql = 'DELETE FROM mst_todo WHERE id=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $this->id;
		$stmt->execute($data);
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	
		$dbh = null;
	}
}

$id = $_GET['delete'];
$delete = new Delete($id);
$delete->delete();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete Page</title>
</head>
<body>
	<p>削除しました。<br /><br /></p>
	<a href="index_display.php">戻る</a>
</body>
</html>