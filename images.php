<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Image Directory</title>
</head>

<body>
<?php
$cars = new DirectoryIterator('image_dir/cars');
foreach($cars as $fileInfo)
{
	if($fileInfo->isDot() || $fileInfo->isDir())
	{
		continue;
	}
	echo "\t<img src='"
	.$fileInfo->getPathname() ."' alt='".$fileInfo->getFilename() ."' onclick='alert(\"".$fileInfo->getFilename()."\")' />";
	
	echo "\n<br/>";
}
?>

</body>
</html>