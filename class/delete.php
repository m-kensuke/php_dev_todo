<?php
require './dbconnect.php';
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

?>