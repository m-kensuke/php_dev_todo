<?php
require_once 'class/edit.php';
if(isset($_GET['edit']))
{
    $id = (int) $_GET['edit'];
    $edit = new Edit($id);
    $results = $edit->edit();
} 
?>
<?php include 'inc/head.php' ?>
<body class="pl-4 mt-5">
    <header>
        <div>
            <?php
            if(isset($_GET['edit'])) echo '<h1>Edit ToDo Page</h1>';
            if(!isset($_GET['edit'])) echo '<h1>Create ToDo Page</h1>';
            ?>
        </div>
    </header>
    <div class="d-flex">
        <form  method="post" action="post_check.php">
            <input type="hidden" name="id" value="<?php if(isset($_GET['edit'])) echo $id; ?>">
            <div class="flex-column mt-2">
                <div><label for="title">タイトル</label></div>
                <div><input class="form-control-lg" type="text" name="title" value="<?php if(isset($results['title'])) echo $results['title']; ?>"></div>
            </div>
            <div class="flex-column pt-2" style="margin-top: 30px">
                <div><label for="content">コンテンツ</label></div>
                <div><textarea name="contents" rows="8" cols="40"><?php if(isset($results['content'])) echo $results['content']; ?></textarea></div>                
            </div>
            <br />
            <input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-primary me-md-2" type="submit" value="確認">
        </form>
    </div>
<?php include 'inc/bootstrap.php' ?>
</body>
</html>