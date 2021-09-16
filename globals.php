<?php
echo $_SERVER['SERVER_SOFTWARE'];
$name="ali raza";
function printname()
{

echo $GLOBALS['name'] ;
	
}
printname();

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		title is showes here
	</title>
	<form method="post"<?php $_SERVER['PHP_SELF']?>>
		<input type="text" name="name">
		<input type="submit" name="login">
	</form>
</head>
<body>

</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD']=="POST"){


	$name=htmlspecialchars($_REQUEST['name']);
	if (empty($name)) {
		// code...
echo " empty";
	}
	else{
		echo $name;
	}
}


$str="my nam eis balli raza";
$pattern="/['abc']/i";
echo preg_match_all($pattern, $str);

?>
