<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete Page</title>
</head>
<body>

<?php
class delete
{
	function Delete()
	{
		$id = $_GET['delete'];
		//$id = htmlspecialchars($id,ENT_QUOTES,'UTF-8'); //idは基本hiddenやからhtmlspecialcharしない
			
		$dsn = 'mysql:dbname=todo;host=localhost;charset=utf8';
		$user = 'root';
		$password ='';
		try
		{
			$dbh = new PDO($dsn, $user, $password); //PDOクラスをインスタンス化
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //setAtt~メソッドを参照
		
			$sql = 'DELETE FROM mst_todo WHERE id=?';
			$stmt = $dbh->prepare($sql);
			$data[] = $id;
			$stmt->execute($data);
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		
			$dbh = null;
		}
		catch (Exception $e)
		{
			print'ただいま故障により大変ご迷惑をおかけしております。';
			exit();
		}
	}
}
$delete = new delete();
$delete->Delete();

echo '削除しました。<br />';
echo '<br />';
echo '<a href="index.php">戻る</a>';

?>

</body>
</html>