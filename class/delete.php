<?php
require_once "class/dbconnect.php";
class Delete extends DBconnect
{
	private $id;
	function __construct($id)
	{
        parent::__construct();
		$this->id = $id;
	}

	public function deleteContents()
    {
        $sql = "SELECT title,content FROM mst_todo WHERE id=$this->id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
        $this->dataBaseDisconnect();
    }

    public function deleteCheck($results)
    {   
        echo '<input type="hidden" name="title" value="'.$results['title'].'">';
		echo '<input type="hidden" name="contents" value="'.$results['content'].'">';
        echo '<input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る">';
        echo '<input class="btn btn-primary me-md-2 ml-1" type="submit" value="削除する">';
    }
	
	public function delete()
	{
		$sql = 'DELETE FROM mst_todo WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$data[] = $this->id;
		$stmt->execute($data);
		$this->dataBaseDisconnect();
	}
}

?>