<?php
require_once "class/mysql.php";
class Index extends MySQL
{
    function dataCount()
    {
        $sql = 'SELECT COUNT(*) AS count FROM mst_todo';
        $stmt = $this->dbh->prepare($sql);
        //$stmt = $this->dbh->prepare($this->sql);
        $stmt->execute();
        $totalCount = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $totalCount['count'];
        $this->dataBaseDisconnect();
    }

    public function get5Indexdata($nowPage)
    {
        $sql = "SELECT * FROM mst_todo ORDER BY id ASC LIMIT :start,:max";
        $stmt = $this->dbh->prepare($sql);
        //:startと:maxに値を代入	
        if ($nowPage == 1)
        {
            $stmt->bindValue(":start", $nowPage -1,PDO::PARAM_INT);
            $stmt->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }
        if($nowPage != 1) 
        {
            $stmt->bindValue(":start", ($nowPage -1 ) * MAX_VIEW,PDO::PARAM_INT);
            $stmt->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $results;
        $this->dataBaseDisconnect();
    }

}



?>