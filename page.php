<?php
//今のところは使わん
require_once "dbconnect.php";
class Page
{
    public function databaseCount()
    {
        $dbh = databaseConnect();
        $count = $dbh->prepare('SELECT COUNT(*) AS count FROM mst_todo');
        $count->execute();
        $totalCount = $count->fetch(PDO::FETCH_ASSOC);
        return $totalCount;
        $dbh = null;
    }

    public function totalPage($totalCount)
    {
        define('MAX_VIEW', 5); //最大５件表示
        $totalPage = ceil($totalCount['count'] / MAX_VIEW);    //celi:切り上げ
        return $totalPage;
        $dbh = null;
    }

    public function nowPage()
    {
        //現在ページ番号取得
        if(!isset($_GET['page_no'])) $nowPage = 1;
        if(!isset($_GET['page_no']) == false) $nowPage = $_GET['page_no'];
        return $nowPage;

    }

    public function previewNext($nowPage, $totalPage)
    {
        //前へ・次への処理
        $prev = max($nowPage - 1, 1);
        $next = min($nowPage + 1, $totalPage);

        $prev = htmlspecialchars($prev,ENT_QUOTES,'UTF-8');
        $next = htmlspecialchars($next,ENT_QUOTES,'UTF-8');
        $previewNext = array($prev, $next);
        return $previewNext;
    }
        
    /*public function horyu()
    {
        //ToDoリストの情報取得
        $select = $dbh->prepare("SELECT * FROM mst_todo ORDER BY id ASC LIMIT :start,:max");
        //:startと:maxに値を代入	
        if ($nowPage == 1)
        {
            $select->bindValue(":start", $nowPage -1,PDO::PARAM_INT);
            $select->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }
        else 
        {
            $select->bindValue(":start", ($nowPage -1 ) * MAX_VIEW,PDO::PARAM_INT);
            $select->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }

        $select->execute();
        $rec = $select->fetchAll(PDO::FETCH_ASSOC); 
    }*/

    public function pageDisplay($nowPage, $totalPage, $previewNext)
    {
        //ページ番号表示
        if ($nowPage > 1) echo "<a href='./indexdisplay.php?page_no=$$previewNext[0]' style='padding: 5px'>前へ</a>";
        for ($n = 1; $n <= $totalPage; $n ++)
        {
            if ($n == $nowPage) echo "<span style='padding: 5px;'>$nowPage</span>";
	        if($n != $nowPage) echo "<a href='./indexdisplay.php?page_no=$n' style='padding: 5px;'>$n</a>";
        }
        if ($nowPage < $totalPage) echo "<a href='./indexdisplay.php?page_no=$$previewNext[1]' style='padding: 5px;'>次へ</a>";
    }
}
?>