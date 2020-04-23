<?php
include "server.php";


if(isset($errorMsg))
{
	foreach($errorMsg as $error)
	{
		?>
		<div style="color:red">
		<strong><?php echo $error; ?></strong>
		</div>
		<?php
	}
}
if(isset($loginMsg))
{
	?>
	<div style="color:green">
	<strong><?php echo $loginMsg; ?></strong>
	</div>
	<?php
}
?>
<!Doctype html>
<html>
<head>
<title>Maker Blog Admin</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action="#" method="post">
<div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password">

    <button type="submit" name="login">Login</button>
  </form>
  </body>
  </html>