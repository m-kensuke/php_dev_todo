<?php
require "class/dbconnect.php";
class Edit extends DBconnect
{
    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }
    public function edit()
    {
        //$dbh = databaseConnect();       
        $sql = "SELECT title,content,updated_at FROM mst_todo WHERE id=$this->id";
        $stmt = $this->dbh->prepare($sql);
        //$data = $this->id;
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
        $this->dataBaseDisconnect();
    }
}
?>