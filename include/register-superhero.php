<?php if (isset($_POST['submit'])) {
	// Setting variables for superhero name, email and password and validating with filter_input
	$name = filter_input(INPUT_POST, 'cName', FILTER_SANITIZE_STRING)
		or die('Missing/illegal cName parameter');

	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)
		or die('Missing/illegal email parameter');

	$pw = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING)
		or die('Missing/illegal pw parameter');
	// Hashing the password with a function --> making it to a unreadable string in the DB
	$pw = password_hash($pw, PASSWORD_DEFAULT);

	echo 'Creating ' .$name. 's <br>' .$email.'<br> with password: '.$pw;
	// SQL statement - inserting the users values into the DB
	$sql = ("INSERT INTO characters(cName, email, pw) VALUES (?, ?, ?)");
	$stmt = $con->prepare($sql);
 	$stmt->bind_param('sss', $name, $email, $pw);
	$stmt->execute();
	// If the above is true then a superhero gets created
	if ($stmt->affected_rows > 0){
		$namesuccess = 'Superhero '.$name.' created!';
		} 
	// If the above is false then a superhero is not created
	elseif ($stmt->affected_rows < 0){
		$namefail = 'Could not add the superhero... <br> Please try with another email/password combination';
	}
	else {
		echo '';
		} 					
}
?>
