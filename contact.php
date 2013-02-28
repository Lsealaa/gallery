<?php
	
	// * IMPORTANT * Set your email information here
	define('DESTINATION_EMAIL','Lsealaa@aol.com');
	define('MESSAGE_SUBJECT','form Demo');
	define('REPLY_TO', 'Lsealaa@aol.com');
	define('FROM_ADDRESS', 'Lsealaa@aol.com');
	define('REDIRECT_URL', 'http://www.rebequita-design.com/school/imd410/gallery/');
	
	require_once('inc/validation.php');
	require_once('inc/config.php');
	
	//get all content related to this page (contact)
	$sql="SELECT * FROM site_content WHERE page_name='contact'";
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

<body id="contact_page">

<div class="container">
	<div class="header">
  <?php include_once('inc/header.php'); ?>
  </div>
  <?php require_once('inc/nav.php'); ?>
 
  <article class="content">
    <h1>Please fill out form to reach us...</h1>
      <p> <?php echo $main; ?> </p>
      
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<p>
				<label for="name">Name:</label><?php echo @$name_error; ?>
				<input type="text" id="name" name="name" value="<?php echo @$name ?>" class="required" />
			</p>
			<p>
				<label for="email">Email:</label><?php echo @$email_error; ?>
				<input type="text" id="email" name="email" value="<?php echo @$email ?>" class="email required" />
			</p>
			<p>
				<label for="message">Message:</label><?php echo @$message_error; ?>
				<textarea cols="45" rows="7" id="message" name="message" class="required"><?php echo @$message ?></textarea>
			</p>
			<input name="submitted" type="submit" value="Send" />
		</fieldset>
	</form>
    
  </article>
  <div class="footer">
  <?php include_once('inc/footer.php'); ?>
  </div>
  <!-- end .container --></div>
</body>
</html>
