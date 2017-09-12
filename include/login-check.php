	<?php if (isset($_POST['submit'])){
		// Setting variables for password and superhero name and validating with filter_input
		$un = filter_input(INPUT_POST, 'cName', FILTER_SANITIZE_STRING)
			or die('Missing/illegal name parameter');
		$pw = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING)
			or die('Missing/illegal password parameter');
			// Connecting to DB
			require_once('include/db_con.php');

			// SELECTING data FROM table in DB using placeholders
			$sql = 'SELECT idChar, cName, email, pw FROM characters WHERE cName=?';
			// Using prepared stmt in order to avoid SQL injections
			$stmt = $con->prepare($sql);
			// binding placeholder in parameter
			$stmt->bind_param('s', $un);
			$stmt->execute();
			$result = $stmt->get_result();
			if($row = $result->fetch_assoc()) {
			/* Boolean: verifying if the id, username and password match with the entered text - 
			and if this is the case then you get redireted to the login.page */
			$hash = $row['pw'];
			if (password_verify($pw, $hash)){
				session_start();
				$_SESSION['id'] = $row['idChar']; // creating SESSIONS to be used on the welcome.page 
				$_SESSION['u_email'] = $row['email'];
				$_SESSION['supername'] = $row['cName'];
				header("Location: welcome.php");
				exit();
			} else {
				// Redirecting the user to login.php if the $un/$pw is wrong. 
				// A message is echoed on the login.php if the login fail - using the urldecode function which returns the url string
				header('Location: login.php?wrong=' . urldecode(base64_encode("Wrong Username or password")));
				exit();
			}
	}
} ?>