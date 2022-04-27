<?php
require_once "class/delete.php";
$id = $_POST['delete'];
$delete = new Delete($id);
$delete->delete();

?>
<?php include 'inc/head.php'?>
<body>
	<p>削除しました。<br /><br /></p>
	<a href="display.php">戻る</a>
</body>
</html>