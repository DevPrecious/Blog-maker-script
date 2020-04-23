<?php

require_once "config.php";

session_start();

if(isset($_SESSION["admin_login"]))
{
	header("location:index.php");
}

if(isset($_REQUEST['login']))
{
	$username = strip_tags($_REQUEST['username']);
	$password = strip_tags($_REQUEST['password']);
	
	if(empty($username)){
		$errorMsg[] = "Please enter your username";
	}
	else if(empty($password)){
		$errorMsg[] = "Please enter password";
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("select * from admin where username=:uname");
			$select_stmt->execute(array(':uname'=>$username));
			$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
			
			if($select_stmt->rowCount() > 0)
			{
				if($username==$row["username"])
				{
					if($password==$row['password'])
					{
						$_SESSION['admin_login']=$row['id'];
						$loginMsg = "Successfully Login";
						header("refresh:2; index.php");
					}
					else
					{
						$errorMsg[]="Wrong password";
					}
				}
				else
				{
					$errorMsg[]="Wrong username or password, you can always edit it from your database";
				}
			}
			else
			{
					$errorMsg[]="Wrong username or password, you can always edit it from your database";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
}
?>