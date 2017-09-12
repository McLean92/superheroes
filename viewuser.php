<?php
session_start(); 
require_once('include/db_con.php');
include ('include/img_upload.inc.php');
$nam = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- using php include to seperate/organize code -->
<?php include('include/head.php'); ?>
<title>View user</title>

</head>
	<body>	
	
	<div class="bknd-img3">
		<!-- simplegrid - responsive design -->
		<div class="grid grid-pad">
			<div class="box col-10-12 push-1-12"><!-- container START -->
				
				<div class="form_head3">
					<h1 class="headline">
					Welcome <?= $nam ?>
				</h1>
				</div>
				<div class="img">
					<div class="form_body3">
					<!-- creating a form so user can login  -->
						<div class="col-8-12 push-1-12 content">
						<?php 

								$sql = ("SELECT image, cName, description FROM characters WHERE cName='$nam'");
								$stmt = $con->prepare($sql);
								$stmt->execute();
								$stmt->bind_result($image, $name, $desc); 
								if($stmt->fetch()) { ?>
								<div class="super-img col-10-12">
									<img class="col-1-1" src="images/<?= $image ?>">
									<div class="col-5-12 row1">NAME:</div><div class="col-5-12 row2"><?= $name ?></div>
									<div class="col-5-12 row1">DESCRIPTION:</div><div class="col-5-12 row2"> <?= $desc ?></div>
									<div class="col-5-12 row1">TEAM:</div><div class="col-5-12 row2"><?= $name ?></div>
								</div>
								<?php }; ?>

						</div><!-- content END -->
						<div class="col-3-12 sidebar">
							<ul>
								<li><a href="update.php">Edit superhero</a></li>
								<li><a href="viewteam.php">View all team members</a></li>
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