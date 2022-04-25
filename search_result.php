<?php
require "mysql.php";
require "page.php";

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
    $results = $mysql->get5SearchData($like_search, $nowPage);
    $previewNext = $searchPage->previewNext($nowPage, $totalPage);
}
if($search == null)
{
    echo '検索ワードを入力してください';
    echo '<br /><br />';
    exit();
}
?>