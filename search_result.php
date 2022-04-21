<?php
//namespace Search;
require "dbconnect.php";
require_once "index.php";

class SearchResultdata
{
    /*public function __construct($resultCount)
    {   
        $this->resultCount = $resultCount;
    }*/

    public function searchDataCount($like_search)
    {
        $dbh = databaseConnect();
        $stmt = $dbh->prepare("SELECT * FROM mst_todo WHERE title LIKE :search");
        $stmt->bindValue(":search", $like_search, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $resultNum = $stmt->rowCount();
       
        //$resultNum = (int) $resultCount;
    
        $dbh = null;
        return $resultNum;
    }
            
    public function searchResult($like_search, $nowPage)
    {
        //検索結果取得
        $dbh = databaseConnect();
        $stmt = $dbh->prepare("SELECT * FROM mst_todo WHERE title LIKE :search LIMIT :start,:max");
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
        $dbh= null;
    }
}

//class SearchResultPage extends Page
class SearchResultPage extends Page
{      
    function totalSearchPage($resultNum)
    {
        //ページ数計算
        $totalPage = ceil($resultNum / MAX_VIEW);   //celi:切り上げ
        return $totalPage;
    }
    
    public function pageSearchDisplay($nowPage, $totalPage, $previewNext, $search)
    {
        //ページ番号
        if ($nowPage > 1) echo "<a href='./search_result_display.php?page_no=$previewNext[0]&search=$search' style='padding: 5px'>前へ</a>";
        for ($n = 1; $n <= $totalPage; $n ++)
        {
            if ($n == $nowPage) echo "<span style='padding: 5px;'>$nowPage</span>";
            if($n != $nowPage) echo "<a href='./search_result_display.php?page_no=$n&search=$search' style='padding: 5px;'>$n</a>";
        }   
        if ($nowPage < $totalPage)echo "<a href='./search_result_display.php?page_no=$previewNext[1]&search=$search' style='padding: 5px;'>次へ</a>";
        echo "<br />";
        echo "<a href='./indexdisplay.php' style='padding: 5px;'>ToDo一覧</a>";
    }
}

$search = $_GET['search']; //検索ワード 
$like_search = "%".$search."%";

if($search)
{
    $searchResult = new SearchResultdata();
    $searchPage = new SearchResultPage();
    $resultNum = $searchResult->searchDataCount($like_search);
    $totalPage = $searchPage->totalSearchPage($resultNum);
    $nowPage = $searchPage->nowPage();
    $results = $searchResult->searchResult($like_search, $nowPage);
    $previewNext = $searchPage->previewNext($nowPage, $totalPage);
    //var_dump($num);
}
if($search == null)
{
    echo '検索ワードを入力してください';
    echo '<br /><br />';
    echo "<a href='./indexdisplay.php' style='padding: 5px;'>ToDo一覧</a>";
    exit();
}
?>