<?php
session_start();
if( isset($_POST['submit']) ) {

	$name = "fname";
	$dir="uploads/";
	$new_name = false;
	$image = $_FILES["image"]["name"];
	$tmp_name = $_FILES["image"]["tmp_name"];

	if( file_exists("uploads/" .$image) ) {
		echo "file already exists";
		
	} elseif( move_uploaded_file ( $tmp_name, "uploads/".$image) ) {
		
		$get_name = date("d-m-y-h-i-sa");
		// $oldname = $dir . $image;
		//rename($oldname,$get_name);
		//echo $getpath = pathinfo($_FILES["image"]["name"],PATHINFO_FILENAME  );

	 	$_FILES["image"]["name"] = $get_name;
		echo $new_image_name =  $_FILES["image"]["name"] . session_id();	
		echo "<br> file uploaded successfully";


		
	}

		$data = ['name'=>$name, "image"=>$new_image_name];

		$json_obj =  json_encode($data);

		//$op_file = fopen($new_name.".json","w");

		$filename = date("d-m-y-h-i-sa");

		$my_file = fopen($filename.".json", "w") or die("Unable to open file!");
		

		fwrite($my_file, $json_obj);


		//fwrite($op_file,$json_obj);

		fclose($my_file);

	


}



?>
<!DOCTYPE html>
<html>
	<head>



	</head>

	<body>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="image" >
			<input type="submit" name="submit">
		</form>

	</body>

</html>