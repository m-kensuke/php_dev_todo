<?php
require_once 'class/dbconnect.php';
class PostDone extends DBconnect
{
	private $title;
	private $contents;

	public function __construct($title, $contents)
	{
		parent::__construct();
		$this->title = $title;
		$this->contents = $contents;
	}
	public function EditDone($id)
	{
		$sql = 'UPDATE mst_todo SET title=?, content=?, updated_at=CURRENT_TIME WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$data = array($this->title, $this->contents, $id);
		$stmt->execute($data);
		$this->dataBaseDisconnect();
	}
    public function CreateDone()
	{
		$sql = 'INSERT INTO mst_todo(title,content,created_at,updated_at) VALUES (?,?,CURRENT_TIME,CURRENT_TIME)';
		$stmt = $this->dbh->prepare($sql);
		$data = array($this->title,  $this->contents);
		$stmt->execute($data);
		$this->dataBaseDisconnect();
	}
}
?>