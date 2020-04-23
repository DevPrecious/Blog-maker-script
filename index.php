<!Doctype html>
<html>
<head>
<title>Maker Blog Admin</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<center>
<h2>
<?php

require_once "config.php";

session_start();
if(!isset($_SESSION['admin_login']))
{
	header("location:login.php");
}
$id = $_SESSION['admin_login'];

$select_stmt = $db->prepare("select * from admin where id=:id");
$select_stmt->execute(array(":id"=>$id));

$row  = $select_stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_SESSION['admin_login']))
{
	?>
	Welcome, 
	<?php 
	echo $row['username'];
}
?>
</h2>
<a href="logout.php">Logout</a>
</center>

<h2>General Settings</h2>
<?php include "data.php";

if(isset($updateMsg))
{
	?>
	<div style="color:green">
	<strong><?php echo $updateMsg; ?></strong>
	</div>
	<?php
}
?>
<form action="" method="post">
<input type="text" name="blogname" placeholder="Blog name" required/><br>
<input type="text" name="blogtitle" placeholder="Blog title" required/><br>
<input type="text" name="email" placeholder="Your email" required/><br>
<button type="submit" name="update">Save</button>
</form>

<h2>Upload a post</h2>
<?php include "post.php";
if(isset($msg))
{
	?>
	<div style="color:green">
	<strong><?php echo $msg; ?></strong>
	</div>
	<?php
}

if(!isset($msg))
{
	?>
	<div style="color:red">
	<strong><?php echo $msg; ?></strong>
	</div>
	<?php
}

?>

<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="title" placeholder="Post title" required/><br>
<input type="text" name="phrase" placeholder="Short information" required/><br>
<input type="file" name="image"  required/><br>
<textarea name="content" placeholder="Post Content" required></textarea><br>
<button type="submit" name="post">post</button>
</form>