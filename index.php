<?php
//4/20夜にindex2.phpから移植してきた。それに伴いpage.phpも新規で作成。
//4/21 

require_once ("dbconnect.php");
//use Dbconnect;

define('MAX_VIEW', 5); //最大５件表示
class Index
{
    public function get5data($nowPage)
    {
        $dbh = databaseConnect();
        $select = $dbh->prepare("SELECT * FROM mst_todo ORDER BY id ASC LIMIT :start,:max");
        
        //:startと:maxに値を代入	
        if ($nowPage == 1)
        {
            $select->bindValue(":start", $nowPage -1,PDO::PARAM_INT);
            $select->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }
        if($nowPage != 1) 
        {
            $select->bindValue(":start", ($nowPage -1 ) * MAX_VIEW,PDO::PARAM_INT);
            $select->bindValue(":max", MAX_VIEW,PDO::PARAM_INT);
        }
        $select->execute();
        $result = $select->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
        $dbh= null;
    }
}

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
        $totalPage = ceil($totalCount['count'] / MAX_VIEW);    //celi:切り上げ
        return $totalPage;
    }

    public function nowPage()
    {
        //現在ページ番号取得
        if(!isset($_GET['page_no'])) $nowPage = 1;
        if(!isset($_GET['page_no']) == null) $nowPage = $_GET['page_no'];
        return $nowPage;

    }

    public function previewNext($nowPage, $totalPage)
    {
        //前へ・次への処理
        $prev = max($nowPage - 1, 1);
        $next = min($nowPage + 1, $totalPage);
        $prev = htmlspecialchars($prev,ENT_QUOTES,'UTF-8');
        $next = htmlspecialchars($next,ENT_QUOTES,'UTF-8');
        return $previewNext = array($prev, $next);
        
    }

    public function pageDisplay($nowPage, $totalPage, $previewNext)
    {
        //ページ番号表示
        if ($nowPage > 1) echo "<a href='./indexdisplay.php?page_no=$previewNext[0]' style='padding: 5px'>前へ</a>";
        for ($n = 1; $n <= $totalPage; $n ++)
        {
            if ($n == $nowPage) echo "<span style='padding: 5px;'>$nowPage</span>";
	        if($n != $nowPage) echo "<a href='./indexdisplay.php?page_no=$n' style='padding: 5px;'>$n</a>";
        }
        if ($nowPage < $totalPage) echo "<a href='./indexdisplay.php?page_no=$previewNext[1]' style='padding: 5px;'>次へ</a>";
    }
}
$index = new Index();
$page  =new Page();
$totalCount = $page->databaseCount();
$totalPage = $page->totalPage($totalCount);
$nowPage = $page->nowPage($totalPage);
$results = $index->get5data($nowPage);
$previewNext =  $page->previewNext($nowPage, $totalPage);
//var_dump($previewNext);
?>
