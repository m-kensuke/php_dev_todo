<?php include 'inc/head.php'; ?>
<?php require_once "index.php"; ?>

<body class="pl-4 pr-4" >
    <header>
        <div class="mt-5 mb-3">
            <h1>My ToDo List</h1>
        </div>
    </header>
    <div class="d-flex flex-row">
        <div class="">
            <!--新規作成-->
            <form action="create_and_edit.php">
                <button class="btn btn-primary me-md-2" type="submit" style="padding: 10px;font-size: 30px;margin-bottom: 10px">New Todo</button>
            </form>
        </div>
        <!--<h4>検索</h4>-->
        <!--検索機能-->
        <div class ="col align-self-center">
            <form method="post" action="branch.php">
                <input class="form-control-lg" type="text" placeholder="検索ワードを入力" name="search_word" style="font-size: 20px; margin-bottom: 15px">
                <input class="btn btn-primary" type="submit" name="search" style="font-size: 20px;margin-bottom: 7px" value="検索">
            </form>
        </div>
    </div>    
    <div class="">
    <!--ToDoリスト表示-->
        <table class="table table-striped text-center">
        <!--<table border="1">-->
        <!--<colgroup span="10"></colgroup>-->
            <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>内容</th>
                <th>作成日時</th>
                <th>更新日時</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            </thead>
            <?php foreach($results as $result): ?>
                <?php if($result == false){
    	    	        break;
                    } ?>
                <form method="post" action="class/branch.php">
                    <tr>
                        <td><?php echo $result['id'];?></td>
                        <td><?php echo $result['title'];?></td>
                        <td><?php echo nl2br($result['content']);?></td>
                        <td><?php echo $result['created_at'];?></td>
                        <td><?php echo $result['updated_at'];?></td>
                        <td><button class="btn btn-outline-success" type="submit" name="edit" value="<?php echo $result['id']?>" style="padding: 10px;font-size: 16px;">編集する</button></td>
                        <td><button class="btn btn-outline-danger" type="submit" name="delete" value="<?php echo $result['id']?>" style="padding: 10px;font-size: 16px;">削除する</button></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="btn btn-outline-secondary">
        <?php $page->pageDisplay($nowPage, $totalPage, $previewNext); ?>
    </div>
    
<?php include 'inc/bootstrap.php';?>
</body>
</html>