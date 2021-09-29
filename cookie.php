<?php

$name = "cookiename";

setCookie( $name, time(), time() + 3600);
$r_time = 3600 - ( time() - $_COOKIE['cookiename'] );
 echo  $display_time = date("i",$r_time);




?>


<?php 
 $time1 = time() + 1*60;

$time2  = time();

 $timediff = $time1 - $time2;

?>
<?php

 $time1 = time() + 1*60;

$time2  = time();

 $timediff = $time1 - $time2;

 $error = 0;

if (isset($_POST['log'])) {
	setcookie( "user",  "admin", $time1);

	$name = false;
	$error = 0;
	$name_err = false;

	if(isset($_COOKIE["user"])) { 
	echo "<br/>Cookie Value: " . $_COOKIE["user"];
		echo $name = $_POST['fname']; 
    //echo "Sorry, cookie is not found!"; 
	}  

	if(empty($_POST['fname'])){

		echo $name_err = "field cant be empty";
		$error = 1;
	}
	else{

		

	}
	if($error == 0 ){
		echo " your response is submitted";
	}

	

} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>page title</title>
</head>
<body>
	<form method="POSt">
		Name:<br>
		<input type="<?php if(isset($_COOKIE['user']) &&  $error == 0 ){
			echo "hidden";
		}else {echo "text";}?>" name="fname" >

		<input type="submit" name="log" <?php if( isset($_COOKIE["user"]) &&  $error == 0 ) {
echo "disabled";
} ?> >

	</form>

</body>
</html>


 <?php
if( (isset($_COOKIE["user"]) || isset($_POST['log'])) &&  $error == 0 ) {
echo "please arrive back in " . $timediff ."min";
}

?>