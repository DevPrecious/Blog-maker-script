<?php
include "admin/config.php";

$sql = "select * from general";
$query = $db->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0){
	foreach ($results as $result)
	{
	}
}
?>
<!DOCTYPE html>
<html>
<title><?php echo $result->blog_name; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b><?php echo $result-> blog_name; ?></b></h1>
  <p>Welcome to the blog of <span class="w3-tag"><?php echo $result-> blog_title; ?></span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
	<?php include "admin/post.php";
	$res = mysqli_query($db, "select * from posts order by id DESC");
	?>
	<?php
    if (mysqli_num_rows($res) > 0)
	{		
		while($row = mysqli_fetch_assoc($res))
		{
			echo "<div class='w3-card-4 w3-margin w3-white'>";
echo "<img src='admin/upload/".$row['image']."' alt='Nature' style='width:100%'>";
    echo "<div class='w3-container'>";
      echo "<h3>".$row['title']."</b></h3>";      
    echo "</div>";

    echo '<div class="w3-container">
      <p>'.$row['phrase'].'</p>';
	  echo '
	  
	<div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b><a href="content.php/id='.$row["id"].'">READ MORE &raquo;</a></b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments &nbsp;</b> <span class="w3-tag">0</span></span></p>
        </div>
      </div>
    </div>
  </div>';
	}
	}else{
		echo "no post";
	}
	?>
  <hr>


</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="/w3images/avatar_g.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b><?php echo $result->blog_name ;?></b></h4>
	  <h5><b><?php echo $result->email; ?></b></h5>
      <p>This is a news blog created by devprecious using maker scripts    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Popular Posts</h4>
    </div>
	<?php include "admin/post.php";
	$res = mysqli_query($db, "select * from posts");
	?>
	<?php
    if (mysqli_num_rows($res) > 0)
	{		
		while($row = mysqli_fetch_assoc($res))
		{
    echo '<ul class="w3-ul w3-hoverable w3-white">';
      echo '<li class="w3-padding-16">';
        echo "<img src='admin/upload/".$row['image']."' alt='Image' class='w3-left w3-margin-right' style='width:50px'>";
        echo" <span class='w3-large'>".$row['title']."</span><br>";
        }
	}
	else
	{
		echo "no post";
	}
	?>
      </li>  
    </ul>
  </div>
  <hr> 
 
  
  </div>
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>