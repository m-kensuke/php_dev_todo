<?php
//namespace Dbconnect;
class MySQL
{
    //protected  $sql;
    //protected array $data;
    protected  $dbh;
    public function __construct()
    {
        //$this->sql = $sql;
        //$this->data = $data;
        $dsn = 'mysql:dbname=todo;host=localhost;charset=utf8';;
        $user = 'root';
        $password = '';

        try
        {    
            $this->dbh = new PDO($dsn, $user, $password); 
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        }
        catch(PDOException $e)
        {
            echo "データベース接続エラー";
            exit();
        }
    }

    function dataCount()
    {
        $sql = 'SELECT COUNT(*) AS count FROM mst_todo';
        $stmt = $this->dbh->prepare($sql);
        //$stmt = $this->dbh->prepare($this->sql);
        $stmt->execute();
        $totalCount = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo $totalCount['count'];
        return (int) $totalCount['count'];
        $this->dataBaseDisconnect();
    }

    function searchDataCount($like_search)
    {
        $sql = "SELECT COUNT(*) AS count FROM mst_todo WHERE title LIKE :search";
        $stmt = $this->dbh->prepare($sql);
        //$stmt = $this->dbh->prepare($this->sql);
        $stmt->bindValue(":search", $like_search, PDO::PARAM_STR);
        $stmt->execute();
        $totalCount = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $totalCount['count'];
        $this->dataBaseDisconnect();

    }

    public function get5Indexdata($nowPage)
    {
        //define('MAX_VIEW', 5);
        $sql = "SELECT * FROM mst_todo ORDER BY id ASC LIMIT :start,:max";
        $stmt = $this->dbh->prepare($sql);
        //$stmt = $this->dbh->prepare($this->sql);
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        $this->dataBaseDisconnect();
    }



    function dataBaseDisconnect()
    {
        $this->dbh = null;
    }
    
}
define('MAX_VIEW', 5);//最大５件表示
/*$sql = "SELECT COUNT(*) AS count FROM mst_todo";
$data = null;
$mysql = new MySQL($sql, $data);
$result = $mysql->dataCount();
var_dump($result);*/

/*$sql = "SELECT COUNT(*) AS count FROM mst_todo WHERE title LIKE :search";
$like_search = "s";
$mysql = new MySQL($sql);
$result = $mysql->searchDataCount($like_search);
var_dump($result);*/

/*$sql = "SELECT * FROM mst_todo WHERE title LIKE :search LIMIT :start,:max";
$like_search = "s";
$mysql = new MySQL($sql);
$nowPage = 2;
$result = $mysql->get5SearchData($like_search, $nowPage);
var_dump($result);*/
?>