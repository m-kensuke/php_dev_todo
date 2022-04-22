<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit ToDo Page</title>
</head>
<body>

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
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
}

$id = (int) $_GET['edit'];
$id = htmlspecialchars($id,ENT_QUOTES,'UTF-8');
$edit = new Edit($id);
$result = $edit->edit();

?>

<h1>
    Edit ToDo Page
</h1>
<form method="post" action="edit_check.php">
    <div style="margin: 10px">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input type="text" name="title" value="<?php echo $result['title']; ?>">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
        <textarea name="contents" rows="8" cols="40"><?php echo $result['content']; ?></textarea>
    </div>
    <br />
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="確認">
</form>

</body>
</html>