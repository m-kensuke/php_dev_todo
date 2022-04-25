<?php
require_once ("class/indexclass.php");
require_once ("class/page.php");
$index = new Index();
$page  =new Page();
$totalCount = $index->dataCount();
$totalPage = $page->totalPage($totalCount);
$nowPage = $page->nowPage($totalPage);
$results = $index->get5IndexData($nowPage);
$previewNext =  $page->previewNext($nowPage, $totalPage);
//index_display.phpに表示は任せる
?>
