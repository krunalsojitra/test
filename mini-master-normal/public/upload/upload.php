<?php
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "image/".$_FILES["uploadedfile"]["name"]);
$image="image/".$_FILES["uploadedfile"]["name"];
if(!empty($image))
{
				$response['data'] = "Image uploaded successfully.";
				$response['status'] = "1";
				echo json_encode($response);
				exit();
				
}else {
				$response['data'] = "No Image upload.";
				$response['status'] = "0";
				echo json_encode($response);
				exit();
}

?>