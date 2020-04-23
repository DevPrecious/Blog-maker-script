<?php

$db = mysqli_connect('localhost', 'root', '', 'maker');

//posts
$msg = "";
if(isset($_POST['post']))
{
	$title = mysqli_real_escape_string($db, $_POST['title']);
	$phrase = mysqli_real_escape_string($db, $_POST['phrase']);
	$image = $_FILES['image']['name'];
	$content = mysqli_real_escape_string($db, $_POST['content']);
	
	$target = "upload/".basename($image);
	$sql = "insert into posts (title, image, phrase, content) values ('$title', '$image', '$phrase', '$content')";
	mysqli_query($db, $sql);
	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{
		$msg = "Post has been published";
	}else
	{
		$msg = "An error occured";
	}
}

?>