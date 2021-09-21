<?php
$err=false;
$name_err = false;   
$lname_err = false;
$email_err = false;
$gender_err  = false;
$address_err = false;
$phone_err = false;
$Repeat_Password_err = false;
$password_err = false;
$agr_err = false;
$gender_err = false;

$address = false;
$phone = false;
$Repeat_Password = false;
$password = false;
$agr = false;
$name = false;
$lname = false;
$email = false;
$gender = false;


if( isset( $_POST['btn_submit'] ) ) {

	//firtstname
	if( isset( $_POST['name'] ) ) {
		//if  field is empty
		if( empty( $_POST['name'] && trim( $_POST['name'] ) ) ) {

			$name_err=" First Name Field is Required";
			}else{	
			$name= $_POST['name'];

				if( !preg_match( "/^[a-zA-Z-' ]*$/",$name ) ){

				$name_err = " First Name Field is Not  Valid";
				$err = true;
			}

				//if length is less then 2
				if( strlen( $name ) <2 ) {
				$name_err ="Length is too short";
				$err = true;
				}
				//if length is more then 20
				elseif( strlen( $name ) >20 ){
				$name_err ="Length is too long";
				$err = true;
			}

		}

	}


	//LASTNAME:

	if( isset( $_POST['lname'] ) ) {
		//if  field is empty
		if( empty( $_POST['lname'] && trim( $_POST['lname']))   ) {

			$lname_err=" Last Name Field is Required";
			}else{	

			$lname= $_POST['lname'];

				if( !preg_match( "/^[a-zA-Z-' ]*$/",$lname ) ){

				$lname_err = " Last Name Field is Not  Valid";
				$err = true;
			}

				//if length is less then 2
				if( strlen( $lname ) <2 ) {
				$lname_err ="Length is too short";
				$err = true;
				}
				//if length is more then 20
				elseif( strlen( $lname ) >20 ){
				$lname_err ="Length is too long";
				$err = true;
			}

		}

	}
	//email:
	if( isset( $_POST['email'] ) ){
		
			//if  field is empty
			if( empty( $_POST['email'] && trim( $_POST['email'] ) )   ) {
	
				$email_err=" email Field is Required";
				}else{	
					$email= $_POST['email'];
	
					if(!filter_var( $email,FILTER_VALIDATE_EMAIL ) ) {
						$email_err=" Email Field is Not Valid";
						$err = true;
						}
	
					//if length is less then 2
					if( strlen($email)<2 ) {
						$email_err ="Length is too short";
						$err = true;
					}
					//if length is more then 20
						elseif( strlen($email)>20 ){
						$email_err ="Length is too long";
						$err = true;
					}
	
			}
	
		



	}
	

	//address:
	if(isset($_POST['address'])){

		//if  field is empty
		if( empty( $_POST['address'] && trim( $_POST['address'] ) )  ) {

			$address_err=" Address Field is Required";
		 	$err = true;

		}
		else{
			$address = $_POST['address'];
			//if length is less then 10
			if(strlen($address)<10){
				$address_err = "Length is too short";
			}
			//if length is more then 50
			elseif( strlen( $address )>50 ) {
				$address_err ="Length is too long";

			}

		}
		
	}



	//phone:
	if( isset( $_POST['phone'] ) ) {
		//if  field is empty
		if( empty( $_POST['phone'] && trim( $_POST['phone'] ) )  ) {
			$phone_err=" phone No. Field is Required";
	 	 	$err = true;
		}else{
			$phone=$_POST['phone'] ;
			if ( !preg_match( "/^[0-9 ]*$/",$phone ) ) {
				$phone_err=" phone Field iS Not Valid";
				$err = true;

			}
			//if length is less then 7
			if( strlen  ( $phone ) <7  ) {
				$phone_err="length is too short please enter 7 digits";
			    $err = true;

			}
			//if length is more then 7
			elseif(strlen  ( $phone ) >7){
				$phone_err="length is too long please enter 7 digits ";
			    $err = true;
			}



			
		}
	}

	//Actual password:

	if(isset($_POST['actualPassword'])){

		//if  field is empty
		if( empty( $_POST['actualPassword'] ) ) {
			$password_err=" password Field is Required";
			$err = true;
			//&& trim( $_POST['actualPassword'])

		}else{
			$Password=$_POST['actualPassword'] ;
			//if length is less then 6
			if(strlen($Password)<6){
				$password_err="Length is too short";
			}
			//if length is more then 20
			elseif( strlen($Password)>20 ) {

				$password_err="Length is too long";
			}

		}
	}



	//Repeat password:

	if( isset( $_POST['RepeatPassword'] ) ) {
		//if  field is empty
		if(empty( $_POST['RepeatPassword'] ) ) {
			$Repeat_Password_err=" Repeat password Field is Required";
			$err = true;

		}else{

			//password match ckeck
			$RepeatPassword= $_POST['RepeatPassword'] ;
			if($RepeatPassword != $_POST['actualPassword'] ) {
				$Repeat_Password_err="password does not match please try again";
				$err = true;

			}

		}

	}

	//gender
		if(empty($_POST['gender'] ) ) {

			$gender_err="please select your gender";
		$err = true;

		}else {
			$gender = $_POST['gender'] ;
		}
	//agree terms:
	if( empty( $_POST['agreeterms'] ) ) {
			$agr_err="please accept terms first check the box";
			$err = true;

	}
	
	
	// Collect Response if, Not any Error occur
	if(  ! $err ) {

		echo"<h1>YOUR RECORD SUBMITTED SUCCESSFULLY</h1>";
	}






}

	
?>



<!DOCTYPE html>
    <html>
        <head>
<style>

.error {color: #FF0000;}




</style>

    <meta charset="utf-8">
    <title>form handling</title>
    
</head>
<body>
<fieldset>
<legend>Registeration form</legend>
<form method="post">
	<div class="floating-label">
 FirstName:<br>
    <input type="text" name="name" value="<?php echo $name; ?>"> 
	<span class="error">* <?php echo  $name_err; ?></span><br>

LastName:<br>
    <input type="text" name="lname" value="<?php echo $lname; ?>"> 
	<span class="error">* <?php echo  $lname_err; ?></span><br>

email:<br>
    <input type="text" name="email" value="<?php echo $email; ?>">
	<span class="error">* <?php echo  $email_err; ?></span><br><br><br>

Address:<br>
    <input type="text" name="address" value="<?php echo $address; ?>"> 
	<span class="error">* <?php echo  $address_err; ?></span><br>

Phone:<br>
    <input type="text" name="phone" value="<?php echo $phone; ?>"> 
	<span class="error">* <?php echo  $phone_err; ?></span><br>

Password:<br>
    <input type="password" name="actualPassword"> 
	<span class="error">* <?php echo  $password_err; ?></span><br>

RepeatPassword:<br>
    <input type="password" name="RepeatPassword" > 
	<span class="error">* <?php echo  $Repeat_Password_err; ?></span><br>

gender:
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value="male">male
    <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female" ) echo "checked"; ?> value="female">female

    
    <span class="error">* <?php echo  $gender_err;?></span><br><br>

I agree to the terms:

<input type="checkbox" name="agreeterms">

<span class="error">* <?php echo  $agr_err; ?></span><br><br>

<input type="submit" name="btn_submit" ><br><br>

<input type="reset" >

</div>
    </form>
    </fieldset>
</body>
</html>