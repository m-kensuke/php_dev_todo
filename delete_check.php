<?php
require_once "dbconnect.php";
class DeleteCheck
{
    private $id;
	function __construct($id)
	{
		$this->id = $id;
	}
    public function deleteContents()
    {
        $dbh = databaseConnect();
        $sql = "SELECT title,content FROM mst_todo WHERE id=$this->id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
        $dbh = null;

    }

    public function deleteCheck($results)
    {   
        echo '<input type="hidden" name="title" value="'.$results['title'].'">';
		echo '<input type="hidden" name="contents" value="'.$results['content'].'">';
        echo '<input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る">';
        echo '<input class="btn btn-primary me-md-2 ml-1" type="submit" value="削除する">';
    }
}

$id = $_GET['delete'];
$delete_check = new DeleteCheck($id);
$results = $delete_check->deleteContents();

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

<title>Delete Check Page</title>
</head>
<body>
    <div class="pt-2 pl-4">
        <p>本当に削除しますか?</p>
        <p>タイトル：<?php echo $results['title']; ?><br /></p>
        <p>コンテンツ：<?php echo $results['content']; ?><br /></p>
        <form method="post" action="delete.php">
            <?php echo '<input type="hidden" name="delete" value="'.$id.'">'; ?>
            <input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-primary me-md-2 ml-1" type="submit" value="削除する">
        </form>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>