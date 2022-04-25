<?php
//4/20夜にindex2.phpから移植してきた。それに伴いpage.phpも新規で作成。
//4/22 SQL文を記述するメソッドはmysql.php/MySQLクラスへ移動

require_once ("mysql.php");
require_once ("page.php");

$index = new MySQL();
$page  =new Page();
$totalCount = $page->dataCount();
$totalPage = $page->totalPage($totalCount);
$nowPage = $page->nowPage($totalPage);
$results = $index->get5IndexData($nowPage);
$previewNext =  $page->previewNext($nowPage, $totalPage);
//index_display.phpに表示は任せる
?>
