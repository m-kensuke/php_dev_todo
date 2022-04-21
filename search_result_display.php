<?php 
//require_once "index.php"; 
require "search_result.php"
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
<h1>Search Result Page</h1>
<!--検索結果表示-->
<p>検索ワード：<?php echo $search; ?><br /></p>
<p>ヒット件数：<?php echo $resultNum; ?><br /><br /></p>
<!--ToDoリスト表示-->
<table border="1">
<colgroup span="5"></colgroup>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>更新日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    <?php foreach($results as $result): ?>
        <?php if($result == false) break;?>
        <form method="post" action="branch.php">
            <tr>
                <td><?php echo $result['id'];?></td>
                <td><?php echo $result['title'];?></td>
                <td><?php echo nl2br($result['content']);?></td>
                <td><?php echo $result['created_at'];?></td>
                <td><?php echo $result['updated_at'];?></td>
                <td><button type="submit" name="edit" value="<?php echo $result['id']?>" style="padding: 10px;font-size: 16px;">編集する</button></td>
                <td><button type="submit" name="delete" value="<?php echo $result['id']?>" style="padding: 10px;font-size: 16px;">削除する</button></td>
            </tr>
        </form>
    <?php endforeach; ?>
</table>

<?php $searchPage->pageSearchDisplay($nowPage, $totalPage, $previewNext, $search); ?>

</body>
</html>