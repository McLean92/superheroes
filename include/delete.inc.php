<?php if (isset($_POST['submit'])){
	require_once ('db_con.php');
	// Creating variables to use in the following SQL code
	$team = filter_input(INPUT_POST, 'superheroTeam', FILTER_SANITIZE_STRING)
		or die('Missing/illegal superheroTeam parameter');
	$id = filter_input(INPUT_POST, 'cName', FILTER_SANITIZE_STRING)
		or die('user not found');
	// DELETE statement to delete the superhero team from DB
	$sql = ("DELETE FROM category WHERE superheroTeam ='$team' AND idChar='$id';");
	$stmt = $con->prepare($sql);
	$stmt->bind_param('ss', $team, $id);
	$stmt->execute();
	header("Location: ../welcome.php?=deleted");
	exit();

}
?>