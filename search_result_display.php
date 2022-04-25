<?php 
//require_once "index.php"; 
require_once "search_result.php";
//require_once "page.php";
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Index Page</title>
</head>
<body class="pl-4 pr-4">
<header>
    <div class="mt-5 mb-3">
        <h1>Search Result Page</h1>
    </div>
</header>
<div class="">
    <!--検索結果表示-->
    <p>検索ワード：<?php echo $search; ?><br /></p>
    <p>ヒット件数：<?php echo $totalCount; ?><br /><br /></p>
</div>
<!--ToDoリスト表示-->
<div class="">
    <table class="table table-striped text-center">
    <!--<colgroup span="10"></colgroup>-->
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
                    <td><button class="btn btn-outline-success"  type="submit" name="edit" value="<?php echo $result['id']?>" style="padding: 10px;font-size: 16px;">編集する</button></td>
                    <td><button class="btn btn-outline-danger" type="submit" name="delete" value="<?php echo $result['id']?>" style="padding: 10px;font-size: 16px;">削除する</button></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </table>
</div>
<div class="btn btn-outline-secondary">
    <?php $searchPage->pageSearchDisplay($nowPage, $totalPage, $previewNext, $search); ?>
</div>
<a href='./index_display.php' style='padding: 5px;'>ToDo一覧</a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>