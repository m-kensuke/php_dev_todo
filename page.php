<?php
require_once "mysql.php";

class Page extends MySQL
{
    public function totalPage($totalCount)
    {
        $totalPage = ceil($totalCount / MAX_VIEW);    //celi:切り上げ
        return $totalPage;
    }

    public function nowPage()
    {
        //現在ページ番号取得
        if(!isset($_GET['page_no'])) $nowPage = 1;
        if(isset($_GET['page_no'])) $nowPage = $_GET['page_no'];
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
        if ($nowPage > 1) echo "<a href='./index_display.php?page_no=$previewNext[0]' style='padding: 5px'>前へ</a>";
        for ($n = 1; $n <= $totalPage; $n ++)
        {
            if ($n == $nowPage) echo "<span style='padding: 5px;'>$nowPage</span>";
	        if($n != $nowPage) echo "<a href='./index_display.php?page_no=$n' style='padding: 5px;'>$n</a>";
        }
        if ($nowPage < $totalPage) echo "<a href='./index_display.php?page_no=$previewNext[1]' style='padding: 5px;'>次へ</a>";
    }
}

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
    }
}
?>