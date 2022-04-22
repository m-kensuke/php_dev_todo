<?php
require "mysql.php";
require "page.php";
//4/22 SQL文を記述するメソッドはmysql.php/MySQLクラスへ移動

class SearchResultPage extends Page
{      
    function totalSearchPage($totalCount)
    {
        //ページ数計算
        $totalPage = ceil($totalCount / MAX_VIEW);   //celi:切り上げ
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
        echo "<a href='./index_display.php' style='padding: 5px;'>ToDo一覧</a>";
    }
}

$search = $_GET['search']; //検索ワード 
$like_search = "%".$search."%";

//GETメソッドで検索ワードを受けたら実行
if($search)
{
    $mysql = new MySQL();
    $totalCount = $mysql->searchDataCount($like_search);
    $searchPage = new SearchResultPage();
    $totalPage = $searchPage->totalSearchPage($totalCount);
    $nowPage = $searchPage->nowPage();
    $result = $mysql->get5SearchData($like_search, $nowPage);
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