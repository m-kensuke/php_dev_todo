<?php
require_once 'class/mysql.php';
class Search extends MySQL
{
    function searchDataCount($like_search)
    {
        $sql = "SELECT COUNT(*) AS count FROM mst_todo WHERE title LIKE :search";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(":search", $like_search, PDO::PARAM_STR);
        $stmt->execute();
        $totalCount = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $totalCount['count'];
        $this->dataBaseDisconnect();

    }

    public function get5SearchData($like_search, $nowPage)
    {
        //検索結果取得
        //define('MAX_VIEW', 5);
        $sql = "SELECT * FROM mst_todo WHERE title LIKE :search LIMIT :start,:max";
        $stmt = $this->dbh->prepare($sql);
        //$stmt = $this->dbh->prepare($this->sql);
        if ($nowPage == 1)
        {
            $stmt->bindValue(":search", $like_search, PDO::PARAM_STR);
            $stmt->bindValue(":start", $nowPage -1, PDO::PARAM_INT);
            $stmt->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }
        if ( $nowPage != 1)
        {
            $stmt->bindValue(":search",$like_search,PDO::PARAM_STR);
            $stmt->bindValue(":start",($nowPage -1 ) * MAX_VIEW,PDO::PARAM_INT);
            $stmt->bindValue(":max",MAX_VIEW,PDO::PARAM_INT);
        }        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        $this->dataBaseDisconnect();
    }

}

?>