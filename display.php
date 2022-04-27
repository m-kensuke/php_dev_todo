<?php 
//$GET['search_word']の有無でToDOリストか検索ページか
if(isset($_GET['search_word'])) require_once "search_result.php"; 
if(!isset($_GET['search_word'])) require_once "index.php";
?>

<?php include 'inc/head.php';?>
<body class="pl-4 pr-4">
<header>
    <div class="mt-5 mb-3">
        <?php if(isset($_GET['search_word'])) :?>
            <h1>Search ToDo Page</h1>
        <?php endif;?>
        <?php if(!isset($_GET['search_word'])) :?>
            <h1>ToDo Page</h1>
        <?php endif;?>
    </div>
</header>
<?php include 'inc/create_btn.php'; ?>
<?php include 'inc/search_count.php'; ?>
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
            <form method="post" action="class/branch.php">
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
    <?php if(isset($_GET['search_word'])) $searchPage->pageSearchDisplay($nowPage, $totalPage, $previewNext, $search_word); ?>
    <?php if(!isset($_GET['search_word'])) $page->pageDisplay($nowPage, $totalPage, $previewNext); ?>
</div>

<?php include 'inc/bootstrap.php';?>
</body>
</html>