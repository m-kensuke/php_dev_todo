<?php
require "dbconnect.php";
//require "mysql.php";
class PostDone
{
	private $title;
	private $contents;

	public function __construct($title, $contents)
	{
		$this->title = $title;
		$this->contents = $contents;
	}

	public function EditDone($id)
	{
		$dbh = databaseConnect();
		$sql = 'UPDATE mst_todo SET title=?, content=?, updated_at=CURRENT_TIME WHERE id=?';
		$stmt = $dbh->prepare($sql);
		$data = array($this->title, $this->contents, $id);
		$stmt->execute($data);
		return $this->title;
		$dbh = null;
	}

    public function CreateDone()
	{
		$dbh = databaseConnect();
		$sql = 'INSERT INTO mst_todo(title,content,created_at,updated_at) VALUES (?,?,CURRENT_TIME,CURRENT_TIME)';
		$stmt = $dbh->prepare($sql);
		$data = array($this->title,  $this->contents);
		//$data[] = $this->contents;
		$stmt->execute($data);
		return $this->title;
		$dbh = null;
	}
}

$id = (int) $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$post_done = new PostDone($title, $contents);
if($id) $post_done->EditDone($id);
if($id == false) $post_done->CreateDone();

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
	<title>Create Done Page</title>
</head>
<body>
<?php
if($id) echo '<h4 class="pt-5 pl-4">タイトル「'.$title.'」を編集しました。<br /></h4>';
if($id == false) echo '<h4 class="pt-5 pl-4">タイトル「'.$title.'」を追加しました。<br /></h4>';
echo '<a class="btn btn-primary me-md-2 mt-5 ml-4" href="index_display.php">ToDo一覧</a>';
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>