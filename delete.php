<?php
require_once "dbconnect.php";
//use DBconnect;

class delete
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
//$id = htmlspecialchars($id,ENT_QUOTES,'UTF-8'); //idは基本hiddenやからhtmlspecialcharしない

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
	<a href="index.php">戻る</a>
</body>
</html>