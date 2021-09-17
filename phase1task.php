<?php
$nameerr=$lnameerr=$emailerr=$gendererr=$address=$phone=$RepeatPassword=$password=$agr="";
$name=$lname=$email=$gender=$addresserr=$phoneerr=$RepeatPassworderr=$passworderr=$agrerr="";
if($_SERVER['REQUEST_METHOD']== "POST")
{

//firstname:
if(empty(htmlspecialchars($_REQUEST['name']))){
 $nameerr=" FIRSTNAME FIELD IS REQUIRED";

}

else{

    $name=check_validity(htmlspecialchars($_REQUEST['name']));
    filter_var($name,FILTER_SANITIZE_STRING);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 

{
    $nameerr=" FIRSTNAME FIELD IS not valid";

}
if (strlen($name)<2 || strlen($name)>20) {
    // code...
     $nameerr="length is notvalid plese choose min:2,max:20";
// }
// if (strlen($name)>20) {
//     // code...
//      $nameerr="length is too long";
// }
}
}
//LASTNAME:

if(empty(htmlspecialchars($_REQUEST['lname']))){
$lnameerr=" NAME FIELD IS REQUIRED";

}

else{

    $lname=check_validity(htmlspecialchars($_REQUEST['lname']));
    filter_var($lname,FILTER_SANITIZE_STRING);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) 

{
    $lnameerr=" lastname FIELD IS not valid";

}

if (strlen($lname)<2 || strlen($lname)>20) {
    // code...
      $lnameerr="length is notvalid plese choose min:2,max:20";
 }

}

//email:
if(empty(htmlspecialchars($_REQUEST['email']))){

    $emailerr=" email FIELD IS REQUIRED";

}
else{


   $email=check_validity(htmlspecialchars($_REQUEST['email']));

filter_var($email,FILTER_SANITIZE_EMAIL);

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

    $emailerr=" email FIELD IS not valid";
}  



if (strlen( $email)<2 || strlen( $email)>20) {
    // code...
      $emailerr="length is notvalid plese choose min:2,max:20";
 }
}   
    //address:
if(empty(htmlspecialchars($_REQUEST['address']))){
$addresserr=" address FIELD IS REQUIRED";

}

else{

    $address=check_validity(htmlspecialchars($_REQUEST['address']));
    filter_var($address,FILTER_SANITIZE_STRING);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$address)) 

{
    $addresserr=" address FIELD IS not valid";

}


if (strlen( $address)<10 || strlen($address)>50) {
    // code...
      $addresserr="length is notvalid plese choose min:2,max:20";
 }

}



//phone:

if(empty(htmlspecialchars($_REQUEST['phone']))){
 $phoneerr=" phone FIELD IS REQUIRED";

}

else{

    $phone=check_validity(htmlspecialchars($_REQUEST['phone']));
    filter_var($phone,FILTER_SANITIZE_STRING);
    
   
    
if (strlen( $phone)<7 || strlen($phone)>7) {
    // code...
       $phoneerr="length is notvalid plese choose 7 digits";
 }


}
//Actual password:


if(empty(htmlspecialchars($_REQUEST['actualPassword']))){

 $passworderr=" password FIELD IS REQUIRED";


}

else{

    $Password=check_validity(htmlspecialchars($_REQUEST['actualPassword']));
    filter_var($Password,FILTER_SANITIZE_STRING);


  
if (strlen( $Password)<6 || strlen( $Password)>20) {
    // code...
      $passworderr="length is notvalid plese choose min:6,max:20 ";
 }


   // if (strlen($Password)<6) {
   //     // code...
   //  $passworderr="length is too short";

   // }
   // if (strlen($Password)>20) {
   //     // code...
   //  $passworderr="length is too long";

   // }

   


}
//Repeat password:

if(empty(htmlspecialchars($_REQUEST['RepeatPassword']))){

 $RepeatPassworderr=" Repeatpassword FIELD IS REQUIRED";

}

else{

    $RepeatPassword=check_validity(htmlspecialchars($_REQUEST['RepeatPassword']));
    filter_var($RepeatPassword,FILTER_SANITIZE_STRING);
    if ($RepeatPassword!=$Password) {
        // code...
        $RepeatPassworderr="password doed not match please try again";

    }
   


}
//gender:
if(empty($_REQUEST['gender'])){

    $gendererr="please select your gender";
    
    
    
    }
    else{
    
    
    
        $gender=check_validity(htmlspecialchars($_REQUEST['gender']));
    }
if (empty($_REQUEST['agreeterms'])) {
    // code...
 $agrerr="please accept terms first check the box";
}

if(!empty($_REQUEST['gender'])){

    echo"<h1>YOUR RECORD SUBMITTED SUCCESSFULLY<h1>";
    
    
    
    }

}






function check_validity($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;


}







?>
<!DOCTYPE html>
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
<input type="text" name="name" value="<?php echo $name;?>"> <span class="error">* <?php echo  $nameerr;?></span><br>

    LastName:<br>
<input type="text" name="lname" value="<?php echo $lname;?>"> <span class="error">* <?php echo  $lnameerr;?></span><br>


email:<br>
<input type="text" name="email" value="<?php echo $email;?>"> <span class="error">* <?php echo  $emailerr;?></span><br><br><br>

  Address:<br>
<input type="text" name="address" value="<?php echo $address;?>"> <span class="error">* <?php echo  $addresserr;?></span><br>
 Phone:<br>
<input type="number" name="phone" value="<?php echo $phone;?>"> <span class="error">* <?php echo  $phoneerr;?></span><br>


Password:<br>
<input type="password" name="actualPassword"> <span class="error">* <?php echo  $passworderr;?></span><br>



RepeatPassword:<br>
<input type="password" name="RepeatPassword" > <span class="error">* <?php echo  $RepeatPassworderr;?></span><br>


gender:
<input type="radio" name="gender"  <?php if(isset($gender) && $gender=="male") echo "checked" ;?> value="male">male



<input type="radio" name="gender" <?php  if(isset($gender)&&$gender=="female" ) echo "checked";?> value="female">female

<span class="error">* <?php echo  $gendererr;?></span><br><br>
I agree to the terms:<input type="checkbox" name="agreeterms"  checked >

<span class="error">* <?php echo  $agrerr;?></span><br><br>
    
<input type="submit" name="btn_submit" >

<input type="reset" >
    </form>
    </fieldset>
</body>
</html>