<?php
require "dbconnect.php";
class Edit
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    public function edit()
    {
        $dbh = databaseConnect();       
        $sql = "SELECT title,content,updated_at FROM mst_todo WHERE id=$this->id";
        $stmt = $dbh->prepare($sql);
        //$data = $this->id;
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
        $dbh = null;
    }
}

if(isset($_GET['edit']))
{
    $id = (int) $_GET['edit'];
    $edit = new Edit($id);
    $results = $edit->edit();
} 
//$id = htmlspecialchars($id,ENT_QUOTES,'UTF-8');
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
    <title>Edit ToDo Page</title>
</head>
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
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>