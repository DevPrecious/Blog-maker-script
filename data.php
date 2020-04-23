<?php

require_once "config.php";

if(isset($_REQUEST['update']))
{
	$blogname = $_REQUEST['blogname'];
	$blogtitle = $_REQUEST['blogtitle'];
	$email = $_REQUEST['email'];
	
try{
	$update_stmt = $db->prepare('UPDATE general SET blog_name=:blogname, blog_title=:blogtitle, email=:email where id=:id');
	$update_stmt->bindParam(':blogname',$blogname);
	$update_stmt->bindParam(':blogtitle',$blogtitle);
	$update_stmt->bindParam(':email',$email);
	$update_stmt->bindParam(':id',$id);
	
	if($update_stmt->execute())
	{
		$updateMsg = "Updated";
		header('refresh:3; index.php');
	}
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
}


		
?>