<?php
	require_once('inc/config.php');
	//get all content related to this page (gallery)
	$sql="SELECT * FROM site_content WHERE page_name='gallery'";
	$myData=$db->query($sql);
	
	//create container for each piece of data
	while($row=$myData->fetch_assoc())
	{
		if($row['section_name']==='intro')
		{
			$sidebar=$row['content'];
			}
			elseif($row['section_name']==='blurb')
			{
				$main=$row['content'];
				}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="css/main.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="gallery_page">

<div class="container">
	<div class="header">
  <?php include_once('inc/header.php'); ?>
  </div>
  <?php require_once('inc/nav.php'); ?>
  <div class="sidebar">
      <?php echo $sidebar; ?>
      <a href="">IMD215</a>
 </div>
 
  <article class="content">
    <h1>Choose your posion...</h1>
      <p> <?php echo $main; ?> </p>
  </article>
  <div class="footer">
  <?php include_once('inc/footer.php'); ?>
  </div>
  <!-- end .container --></div>
</body>
</html>
