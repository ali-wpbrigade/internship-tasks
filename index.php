<?php
$err=false;
$name_err = "";   
$lname_err = "";
$email_err = "";
$gender_err  = "";
$address_err = "";
$phone_err = "";
$Repeat_Password_err = "";
$password_err = "";
$agr_err = "";
$gender_err = "";

$address = "";
$phone = "";
$Repeat_Password = "";
$password = "";
$agr = "";
$name = "";
$lname = "";
$email = "";
$gender = "";

if( isset($_POST['btn_submit']) ) {

	//firtstname
	if( empty(trim($_REQUEST['name']) )   ) {

		$name_err=" First Name Field is Required";
		}else{


			
		$name=check_validity( $_REQUEST['name'] );
		if( !preg_match( "/^[a-zA-Z-' ]*$/",$name ) ){

			$name_err = " First Name Field is Not  Valid";
			$err = true;
		}
		if( strlen($name)<2 || strlen($name)>20 ) {
			$nameerr="Length is not valid please choose min:2,max:20";
			$err = true;
		}

	}


	//LASTNAME:
	if( empty( trim($_REQUEST['lname']) ) ) {

	$lname_err=" Last Name Field is Required";
	$err = true;
	}else{
		$lname=check_validity( $_REQUEST['lname'] );
		
		
    	if ( !preg_match("/^[a-zA-Z-' ]*$/",$lname) ) {
		$lname_err=" last name Field iS Not Valid";
		$err = true;
		}

		if( strlen( $lname )<2 || strlen( $lname ) >20 ) {
			$lname_err="length is not valid please choose min:2,max:20";
			$err = true;
		}
	
	}


	//email:
	if( empty( $_REQUEST['email'] )  ) {
		$email_err=" Email Field is Required";
		$err = true;
	}else {
		$email=check_validity( $_REQUEST['email'] );
		
		if(!filter_var( $email,FILTER_VALIDATE_EMAIL ) ) {
		$email_err=" Email Field iS Not Valid";
		$err = true;
		}

		if ( strlen( $email)<2 || strlen( $email)>20 ) {
		$email_err="length is not valid please choose min:2,max:20";
		$err = true;
		
		}
	}

	//address:
	if ( empty( $_REQUEST['address'] ) ) {
		$address_err=" Address Field is Required";
		$err = true;
	}else {
		$address=check_validity( $_REQUEST['address'] );
		if ( strlen( $address)<10 || strlen($address)>50 ) {
			$address_err="Length is Not Valid please Choose min:10,max:50";
			$err = true;
		}
	}


	//phone:
	if ( empty( $_REQUEST['phone'] ) ) {

		$phone_err=" phone No. Field is Required";
	 	$err = true;
	}else {
		$phone=check_validity( $_REQUEST['phone'] );
		if ( !preg_match( "/^[0-9 ]*$/",$phone ) ) {
			$phone_err=" phone Field iS Not Valid";
			$err = true;
			
		}
		if ( strlen( $phone )<7 || strlen( $phone)>7 ) {
			$phone_err="length is notvalid plese choose 7 digits";
			$err = true;
		}
		

	}

	//Actual password:
	if (empty( $_REQUEST['actualPassword'] )) {
		$password_err=" password Field is Required";
		$err = true;
	}else{
		$Password=check_validity( $_REQUEST['actualPassword'] );
		if( strlen( $Password)<6 || strlen( $Password)>2 ){
			$password_err="length is not valid plese choose min:6,max:20 ";
			$err = true;
		}

	}


	//Repeat password:
	if ( empty($_REQUEST['RepeatPassword'] ) ) {
		$Repeat_Password_err=" Repeat password Field is Required";
		$err = true;

	}else{

		$RepeatPassword=check_validity( $_REQUEST['RepeatPassword'] );
		if ( $RepeatPassword!= $_REQUEST['actualPassword'] ) {
			$Repeat_Password_err="password does not match please try again";
			$err = true;
		}

	}

	//gender:
	if ( empty( $_REQUEST['gender'] ) ) {
		$gender_err="please select your gender";
		$err = true;
	}else{
		$gender=check_validity( $_REQUEST['gender'] );
	}

	//agree terms:
	if (empty( $_REQUEST['agreeterms'] )) {
	
		$agr_err="please accept terms first check the box";
		$err = true;

	}
	// Collect Response if, Not any Error Occour
	if(  ! $err ) {

		echo"<h1>YOUR RECORD SUBMITTED SUCCESSFULLY</h1>";
	}






}

	//function:
	function check_validity( $data ) {
		$data=str_replace(" ","",$data);
		
		$data=trim( $data );
		$data=stripslashes( $data );
		$data=htmlspecialchars( $data );
		return $data;

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
<form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
 FirstName:<br>
    <input type="text" name="name" value="<?php echo $name;?>"> <span class="error">* <?php echo  $name_err;?></span><br>

LastName:<br>
    <input type="text" name="lname" value="<?php echo $lname;?>"> <span class="error">* <?php echo  $lname_err;?></span><br>

email:<br>
    <input type="text" name="email" value="<?php echo $email;?>"> <span class="error">* <?php echo  $email_err;?></span><br><br><br>

Address:<br>
    <input type="text" name="address" value="<?php echo $address;?>"> <span class="error">* <?php echo  $address_err;?></span><br>

Phone:<br>
    <input type="text" name="phone" value="<?php echo $phone;?>"> <span class="error">* <?php echo  $phone_err;?></span><br>

Password:<br>
    <input type="password" name="actualPassword"> <span class="error">* <?php echo  $password_err;?></span><br>

RepeatPassword:<br>
    <input type="password" name="RepeatPassword" > <span class="error">* <?php echo  $Repeat_Password_err;?></span><br>

gender:
    <input type="radio" name="gender"  <?php if(isset($gender) && $gender=="male") echo "checked" ;?> value="male">male
    <input type="radio" name="gender" <?php  if(isset($gender)&&$gender=="female" ) echo "checked";?> value="female">female

    
    <span class="error">* <?php echo  $gender_err;?></span><br><br>

I agree to the terms:

<input type="checkbox" name="agreeterms"   >

<span class="error">* <?php echo  $agr_err;?></span><br><br>

<input type="submit" name="btn_submit" >

<input type="reset" >


    </form>
    </fieldset>
</body>
</html>