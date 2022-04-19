<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Check Page</title>
</head>
<body>

<?php
class edit_check
{
	function EditCheck()
	{
		$id = $_POST['id'];
		$title = $_POST['title'];
		$contents = $_POST['contents'];
		
		$title = htmlspecialchars($title,ENT_QUOTES,'UTF-8');
		$contents = htmlspecialchars($contents,ENT_QUOTES,'UTF-8');
		
		if($title == '')
		{
			echo 'タイトルを入力してください<br />';
		}
		else
		{
			echo 'タイトル：';
			echo $title;
			echo '<br />';
		}
		
		if($contents == '')
		{
			echo '内容を入力してください<br />';
		}
		else
		{
			echo '内容：';
			echo $contents;
			echo '<br /><br />';
		
		}
		
		if($title == '' || $contents == '')
		{
			echo '<form>';
			echo '<input type="button" onclick="history.back()" value="戻る">';
			echo '</form>';
		}
		else
		{
			echo '<form method="post" action="edit_done.php">';
			echo '<input type="hidden" name="title" value="'.$title.'">';
			echo '<input type="hidden" name="id" value="'.$id.'">';
			echo '<input type="hidden" name="contents" value="'.$contents.'">';
			echo '<br />';
			echo '<input type="button" onclick="history.back()" value="戻る">';
			echo '<input type="submit" value="投稿する">';
			echo '</form>';
		}
	}
}

$edit_check = new edit_check();
$edit_check->EditCheck();


?>

</body>
</html>