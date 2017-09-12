<?php if (isset($_POST['submit'])) {

	$name = filter_input(INPUT_POST, 'cName', FILTER_SANITIZE_STRING)
		or die('Missing/illegal cName parameter');
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)
		or die('Missing/illegal email parameter');
	$pw = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING)
		or die('Missing/illegal pw parameter');

	$image = $_FILES['image'];

	// the types of pictures allowed to be uploaded
	$filename = $_FILES['image']['name'];
	$fileTmpName = $_FILES['image']['tmp_name'];
	$fileSize = $_FILES['image']['size'];
	$fileError = $_FILES['image']['error'];
	$fileType = $_FILES['image']['type'];

	// the types of pictures allowed to be uploaded
	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	// the types of pictures allowed to be uploaded
	$allowed = array('jpg', 'jpeg', 'png');
	
	// if the extension is inside the array $allowed, then we will allow it to run...
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			//the allowed filesize
			if ($fileSize < 5000000) {
				// giving the image a new filename too prevent it getting overwritten
				$fileNewName = uniqid('', true).".".$fileActualExt;
				// the place where the file gets uploaded
				$fileDestination = 'uploads/'.$fileNewName;
				//the function telling the file where it is and where to go	
				move_uploaded_file($fileTmpName, $fileDestination);
				echo 'Upload success!';
			} else {
				echo 'Your file is too big!';
			}
		} else {
			echo 'There was an error when uploading image!';
		}


	} else { 
		echo 'You cannot upload images of this type!';
	}

	$pw = password_hash($pw, PASSWORD_DEFAULT);

	echo 'Creating ' .$name. 's' .$email.' with password: '.$pw;


	
	$sql = 'INSERT INTO characters(cName, email, pw) VALUES (?, ?, ?)';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('sss', $name, $email, $pw);
	$stmt->execute();

		}
?>
