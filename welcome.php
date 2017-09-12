<?php
session_start(); 
require_once('include/db_con.php');
include ('include/img_upload.inc.php');
$email = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- using php include to seperate/organize code -->
<?php include('include/head.php'); ?>
<title>Welcome superhero</title>

</head>
	<body>	
	<div class="bknd-img3">
		<!-- simplegrid - responsive design -->
		<div class="grid grid-pad">
			<div class="box col-10-12 push-1-12"><!-- container START -->
				
				<div class="form_head3">
					<h1 class="headline">
					Welcome <?= $_SESSION['supername'] ?><!-- Using SESSION to post the logged in users name -->
				</h1>
				</div>
				<div class="img">
					<div class="form_body3">
					<!-- creating a form so user can login  -->
						<div class="col-8-12 push-1-12 content">
						<!-- Making a SELECT statement to post the chosen team name by joining the 2 tables -->
							<?php		
								$sqlteam = ("SELECT superheroTeam FROM characters c
											 INNER JOIN category cat ON c.idChar = cat.idChar 
											 WHERE c.idChar='{$_SESSION['id']}'");
								$stmtteam = $con->prepare($sqlteam);
								$stmtteam->execute();
								$stmtteam->bind_result($team); 

								while($stmtteam->fetch()) {}; 
							?>
							<!-- Making a SELECT statement to post an image and description from DB -->
							<?php 
								$sql = ("SELECT image, description FROM characters
										 WHERE idChar='{$_SESSION['id']}'");
								$stmt = $con->prepare($sql);
								$stmt->execute();
								$stmt->bind_result($image, $desc); 

								while($stmt->fetch()) {}; ?>
								<div class="col-10-12">
									<img class="super-img col-1-1" src="images/<?= $image ?>">
								</div>

								<?php
									/*  This is visible to users who aren't logged in - because of SESSION */
									if(empty($_SESSION['id'])) {
										echo '<font color=red>You need to log in first!</font>';
									}
									else {
										echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
												<input type="file" name="image">
												<button type="submit" name="submit">Upload superhero</button>
											</form>';
									/*  This is information visible to the user who are logged in - because of SESSION */
										echo '<div class="col-5-12 row1">NAME:</div><div class="col-5-12 row2">'.$_SESSION['supername'].'</div>';
										echo '<div class="col-5-12 row1">DESCRIPTION:</div><div class="col-5-12 row2"><br> '.$desc.'</div>';
										echo '<div class="col-5-12 row1">TEAM:</div><div class="col-5-12 row2"><br> '.$team.'</div>';
										echo '<form class="col-2-12" action="include/delete.inc.php" method="POST">
												<input name="superheroTeam" type="hidden" value="'.$team.'">
												<input name="cName" type="hidden" value="'.$_SESSION['id'].'">
												<button class="del" type="submit" name="submit">Delete Team</button>
											</form>';

										}
								?>

						</div><!-- content END -->
						<div class="col-3-12 sidebar">
							<ul>
								<li><a href="update.php">Edit superhero</a></li>
								<li><a href="viewmembers.php">View all superheroes</a></li>

							</ul>

							<form action="logout.php" method="POST">
								<button class="logout" type="submit" name="submitlogout">Logout</button>
							</form>
						</div><!-- sidebar END -->
					</div><!-- form_body end -->
				</div><!-- img end -->


				<div class="form_footer3">Copyright &#9400; <a href="www.portfolio.charmaine.dk" target="_blank">Charmaine McLean</a> 2017
				</div>

	



			</div><!-- container END -->
		</div><!-- grid grid-pad END -->
	</div><!-- bknd END -->
	</body>
</html>