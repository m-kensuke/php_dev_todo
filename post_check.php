<?php require_once 'class/check.php'?>
<?php include 'inc/head.php'; ?>
<body>
<?php
if(isset($_POST['id'])) $id = $_POST['id'];
$title = (string) $_POST['title'];
$contents = (string) $_POST['contents'];

$post_check = new Check($id, $title, $contents);
$title = $post_check->titleCheck();
$contents = $post_check->contentCheck();

if($title == false || $contents == false) echo '<form class="pl-4 pt-1"><input class="btn btn-primary me-md-2" type="button" onclick="history.back()" value="戻る"></form>';
if($title && $contents)
{
	echo '<div class="pt-2 pl-4">';
		echo '<form method="post" action="post_done.php">';
		if(isset($id)) echo '<input type="hidden" name="id" value="'.$id.'">';
		$post_check->CheckDisplay();
		echo '</form>';
	echo '</div>';
}
?>
<?php include 'inc/bootstrap.php';?>
</body>
</html>