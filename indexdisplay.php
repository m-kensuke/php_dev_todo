<?php require_once "index.php"; ?>
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
<h1>ToDo List Page</h1>
<!--新規作成-->
<form action="create.php"><button type="submit" style="padding: 10px;font-size: 16px;margin-bottom: 10px">New Todo</button></form>
<!--検索機能-->
<h4>検索</h4>
<form method="post" action="branch.php">
    <input type="text" name="search_word" style="font-size: 16px; margin-bottom: 15px">
    <input type="submit" name="search" style="font-size: 16px;margin-bottom: 15px" value="検索">
</form>
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
    <?php foreach($results as $recs): ?>
        <?php if($recs == false){
		        break;
            } ?>
        <form method="post" action="branch.php">
            <tr>
                <td><?php echo $recs['id'];?></td>
                <td><?php echo $recs['title'];?></td>
                <td><?php echo nl2br($recs['content']);?></td>
                <td><?php echo $recs['created_at'];?></td>
                <td><?php echo $recs['updated_at'];?></td>
                <td><button type="submit" name="edit" value="<?php echo $recs['id']?>" style="padding: 10px;font-size: 16px;">編集する</button></td>
                <td><button type="submit" name="delete" value="<?php echo $recs['id']?>" style="padding: 10px;font-size: 16px;">削除する</button></td>
            </tr>
        </form>
    <?php endforeach; ?>
</table>

<?php $page->pageDisplay($nowPage, $totalPage, $previewNext); ?>

</body>
</html>