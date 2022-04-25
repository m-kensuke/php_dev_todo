<?php
require_once "class/search.php";
//require_once "class/mysql.php";
require_once "class/page.php";


$search_word = $_GET['search']; //検索ワード 
$like_search = "%".$search_word."%";

//GETメソッドで検索ワードを受けたら実行
if($search_word)
{
    $search = new Search();
    $totalCount = $search->searchDataCount($like_search);
    $searchPage = new SearchResultPage();
    $totalPage = $searchPage->totalPage($totalCount);
    $nowPage = $searchPage->nowPage();
    $results = $search->get5SearchData($like_search, $nowPage);
    $previewNext = $searchPage->previewNext($nowPage, $totalPage);
}
if($search_word == null)
{
    echo '検索ワードを入力してください';
    echo '<br /><br />';
    exit();
}
?>