<?php
require "class/done.php";
//
$id = $_POST['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$post_done = new PostDone($title, $contents);

//$_POST['id']があるかないかで分岐
if($_POST['id']) $post_done->EditDone($id);
if($_POST['id'] == false) $post_done->CreateDone();

?>
<?php include 'inc/head.php';?>
<body>
<?php
if($_POST['id']) echo '<h4 class="pt-5 pl-4">タイトル「'.$title.'」を編集しました。<br /></h4>';
if($_POST['id'] == false) echo '<h4 class="pt-5 pl-4">タイトル「'.$title.'」を追加しました。<br /></h4>';
echo '<a class="btn btn-primary me-md-2 mt-5 ml-4" href="display.php">ToDo一覧</a>';
?>
<?php include 'inc/bootstrap.php';?>
</body>
</html>