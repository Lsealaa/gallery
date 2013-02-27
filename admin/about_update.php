<?php
	require_once('../inc/config.php');
	//get all content related to this page (home)
	$sql="SELECT * 
	FROM site_content 
	WHERE page_name='about' 
	AND section_name='intro'";
	$myData=$db->query($sql);
	
	//create container for each piece of data
	while($row=$myData->fetch_assoc())
	{
		if($row['section_name'] === 'intro')
			{
				$main = $row['content'];
			}
	}
	
	if(isset($_POST['submitted']))
	{
		$user_content=mysqli_real_escape_string($db, $_POST['body']);
		
		
		$sql="UPDATE site_content
		SET content='$user_content'
		WHERE page_name='about'
		AND section_name='intro'";
		
		$myData=$db->query($sql);
		header('Location: ../about.php');
	}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style>
	legend, select, label, textarea, input {display:block;}
</style>
</head>

<body>
	<h1>Update Page</h1>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    	<fieldset>
        <legend>Update Page Info</legend>
        <select name="page" id="page">
        	<option value="index.php">Home</option>
            <option value="about.php">About</option>
            <option value="contact.php">Contact</option>
        </select>
        <label for="body">Body</label>
            <textarea name="body" rows="10" cols="30">
            <?php echo $main; ?>
            </textarea>
        <input type="submit" name="submitted" value="Update" />
        </fieldset>
</body>
</html>
