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
<?php include 'inc/head.php';?>
<body>
<?php
if($id) echo '<h4 class="pt-5 pl-4">タイトル「'.$title.'」を編集しました。<br /></h4>';
if($id == false) echo '<h4 class="pt-5 pl-4">タイトル「'.$title.'」を追加しました。<br /></h4>';
echo '<a class="btn btn-primary me-md-2 mt-5 ml-4" href="index_display.php">ToDo一覧</a>';
?>
<?php include 'inc/bootstrap.php';?>
</body>
</html>